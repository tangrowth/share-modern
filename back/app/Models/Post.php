<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
