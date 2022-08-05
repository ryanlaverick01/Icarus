<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    //Define fields (columns) that can have their values set.
    protected $fillable = [
        'name'
    ];

    //Define relationship to Holiday model. One Hotel record can be used across multiple Holiday records, hence belongsToMany.
    public function holidays()
    {
        return $this->belongsToMany(Holiday::class);
    }
}
