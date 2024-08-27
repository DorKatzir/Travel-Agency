<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    public function photos() {
        return $this->hasMany(DestinationPhoto::class);
    }

    public function videos() {
        return $this->hasMany(DestinationPhoto::class);
    }
}
