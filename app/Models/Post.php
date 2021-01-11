<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','post','user_id','state','category_id'];
    //relationships

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
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

}
