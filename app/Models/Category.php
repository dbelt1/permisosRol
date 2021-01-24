<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];
    public function places()
    {
        return $this->hasMany('App\Modules\Place');
    }
}
