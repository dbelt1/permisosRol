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
    public function store($request)
    {
        $this->comment->create(['comment'=>$request->comment,'user_id'=>$request->user_id,'post_id'=>$request->post_id]);
    }
}