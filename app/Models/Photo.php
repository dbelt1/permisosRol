<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ImageTrait;

class Photo extends Model

{
    use ImageTrait;

    protected $fillable = ['id','route','post_id'];

    public function getUrlPathAttribute()
    {
        return \Storage::url('posts/image/'.$this->route);
    }
}
