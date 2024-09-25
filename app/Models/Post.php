<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    // Method that allows me to match the user_id from posts table to the user_id in users table
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
