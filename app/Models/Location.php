<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function holidays()
    {
        return $this->belongsToMany(Holiday::class);
    }
}