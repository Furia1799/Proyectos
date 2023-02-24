<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * one to many Comment
     */
    public Function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id','desc');
    }
    /**
     * one to many Like
     */
    public function likes(){
        return $this->hasMany(Like::class);
    }
    /**
     * many to one Inversa 
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
