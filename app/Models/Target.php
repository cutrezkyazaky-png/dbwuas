<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'title',
        'category',
        'target_amount',
        'current_amount',
        'deadline',
        'description',
        'photo'
    ];

    public function getProgressAttribute()
    {
        if ($this->target_amount == 0) {
            return 0;
        }

        return min(
            round(($this->current_amount / $this->target_amount) * 100),
            100
        );
    }
}