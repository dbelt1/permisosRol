<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PostService;
use App\Http\Requests\CommentRequest;
class UserRegisteredController extends Controller
{
    protected $comment;

    public function __construct()
    {
        $this->comment = new CommentService;
        $this->post = new PostService;
        $this->middleware(['auth','verified']);
    }
    public function listPost()
    {
        $posts = $this->post->listPostComment();
        return view('registered.listPost',compact('posts'));
  
    }
    public function createComment(CommentRequest $request)
    {
        $this->comment->store($request);
        return back();
    }
}