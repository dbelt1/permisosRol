<?php

namespace App\Services;

use App\Models\Comment;
class CommentService
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new Comment;
    }
    public function store()
    {
        $this->comment->create(['id','comment','user_id','post_id']);
    }
}