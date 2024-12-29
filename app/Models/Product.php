<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity'
    ];

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function leads()
    {
        return $this->belongsToMany(Lead::class, 'lead_products')
            ->withPivot('quantity', 'price_at_time', 'user_id')
            ->withTimestamps();
    }

    public function addStock($quantity, $userId, $reason = 'purchase', $notes = null, $stockable = null)
    {
        \DB::transaction(function () use ($quantity, $userId, $reason, $notes, $stockable) {
            $this->increment('quantity', $quantity);

            $stockData = [
                'quantity' => $quantity,
                'type' => 'in',
                'reason' => $reason,
                'notes' => $notes,
                'user_id' => $userId
            ];

            if ($stockable) {
                $stockData['stockable_type'] = get_class($stockable);
                $stockData['stockable_id'] = $stockable->id;
            }

            $this->stocks()->create($stockData);
        });
    }

    public function removeStock($quantity, $userId, $reason = 'sale', $notes = null, $stockable = null)
    {
        \DB::transaction(function () use ($quantity, $userId, $reason, $notes, $stockable) {
            if ($this->quantity < $quantity) {
                throw new \Exception('Insufficient stock');
            }

            $this->decrement('quantity', $quantity);

            $stockData = [
                'quantity' => $quantity,
                'type' => 'out',
                'reason' => $reason,
                'notes' => $notes,
                'user_id' => $userId
            ];

            if ($stockable) {
                $stockData['stockable_type'] = get_class($stockable);
                $stockData['stockable_id'] = $stockable->id;
            }

            $this->stocks()->create($stockData);
        });
    }

    public function getActivityFeed()
    {
        return $this->stocks()
            ->with(['user', 'stockable'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($stock) {
                $activity = [
                    'type' => $stock->type,
                    'reason' => $stock->reason,
                    'quantity' => $stock->quantity,
                    'user' => $stock->user->name,
                    'date' => $stock->created_at->format('Y-m-d H:i:s'),
                    'notes' => $stock->notes
                ];

                // Add related document info
                if ($stock->stockable) {
                    $activity['reference'] = match (get_class($stock->stockable)) {
                        Invoice::class => "Invoice #{$stock->stockable->invoice_number}",
                        InternalRequest::class => "Internal Request #{$stock->stockable->request_number}",
                        Lead::class => "Lead #{$stock->stockable->id}",
                        default => null
                    };
                }

                return $activity;
            });
    }
}
