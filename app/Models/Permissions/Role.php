<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','slug','description','full_access'
    ];
    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }
    public function permissions(){
        return $this->belongsToMany('App\Models\Permissions\Permission')->withTimesTamps();
    }
}
