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

    public function users() {
        return $this->hasMany(User::class);
    }
}
