<?php

namespace App\Policies;

use App\Models\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    public function view(User $user, Post $post, $perm = null)
    {
        if ($post->user->havePermission($perm[0])) {
            return true;
        }
        if ($post->user->havePermission($perm[1])) {
            return $post->user->id === auth()->user()->id;
        } else {
            return false;
        }
    }
    public function edit(User $user,Post $post, $perm = null)
    {
        if ($post->user->havePermission($perm[0])) {
            return true;
        }
        if ($post->user->havePermission($perm[1])) {
            return $post->user->id === auth()->user()->id;
        } else {
            return false;
        }
    }
}
