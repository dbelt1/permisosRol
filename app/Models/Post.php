<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','post','user_id','state','length','latitude','category_id'];
    //relationships

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
