<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name','slug','description'
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Permissions\Role')->withTimesTamps();
    }
}
