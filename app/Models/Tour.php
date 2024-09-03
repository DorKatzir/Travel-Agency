<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function package() {
        return $this->belongsTo(Package::class);
    }

   public function bookings() {
       return $this->hasMany(Booking::class);
   }

   public function users() {
        return $this->belongsToMany(User::class);
   }

}
