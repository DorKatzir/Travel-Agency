<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany(MessageComment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
