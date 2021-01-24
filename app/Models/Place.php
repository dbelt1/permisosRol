<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Place extends Model
{
    protected $fillable = [
        'id','name','state','image','description','timeline','createdDate','category_id','length','latitude'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function getUrlPathAttribute()
    {
        return Storage::url('posts/image/'.$this->image);
    }

}
