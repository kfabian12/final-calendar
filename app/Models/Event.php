<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory; 

    use HasFactory;

    // protected $fillable = 

    protected $guarded = [];

    protected $with = [
        'eventName',
        'day',
        'notes',
        'categories',
        'startTime',
        'endTime'
    ]; 

    public function scopeFilter($query, array $filters) {

        $query->when($filters['categories'] ?? false, fn($query, $categories) =>
            $query->whereHas('categories'), fn ($query) =>
                $query->where('slug', $categories)
        );
    }
}
