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
    //queries to comments
    public function getAllComments()
    {
        return $this->comment->where('state',1)->get();
    }
    public function getCommentById($id)
    {
        return $this->comment->findOrFail($id);
    }
    public function store($request)
    {
        $this->comment->create(['comment'=>$request->comment,'user_id'=>$request->user_id,'post_id'=>$request->post_id]);
    }
    public function changeState($id)
    {
        $comment = $this->getCommentById($id);
        $comment->update(['changeState' => 0]);
    }
}