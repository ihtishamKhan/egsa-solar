<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    public function takenBy()
    {
        return $this->belongsTo(User::class, 'taken_by');
    }
}
