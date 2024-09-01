<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    use HasFactory;

    public function destination() {
        return $this->belongsTo(Destination::class);
    }

    public function package_itineraries() {
        return $this->hasMany(PackageItinerary::class);
    }

    public function package_photos() {
        return $this->hasMany(PackagePhoto::class);
    }

    public function package_videos() {
        return $this->hasMany(PackageVideo::class);
    }

    public function package_faqs() {
        return $this->hasMany(PackageFaq::class);
    }

    public function tours() {
        return $this->hasMany(Tour::class);
    }

}
