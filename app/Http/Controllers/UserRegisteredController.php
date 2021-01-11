<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PostService;
class UserRegisteredController extends Controller
{
    protected $comment;

    public function __construct()
    {
        $this->comment = new CommentService;
        $this->post = new PostService;
    }
    public function listPost()
    {
        $posts = $this->post->listPostComment();
        return view('registered.listPost',compact('posts'));
        // return dd($posts);
        
    }
}