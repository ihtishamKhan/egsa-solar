<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'created_by',
        'name',
        'email',
        'phone',
        'remarks',
        'status',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }

    public function stocks()
    {
        return $this->morphMany(ProductStock::class, 'stockable');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'lead_products');
    }
}
