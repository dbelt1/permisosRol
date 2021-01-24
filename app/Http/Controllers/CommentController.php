<?php

namespace App\Http\Controllers;

use App\Services\CommentService;

class CommentController extends Controller
{
    protected $comment;

    public function __construct()
    {
        $this->comment = new CommentService;
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $this->authorize('haveaccess', 'comment.index');
        $comments = $this->comment->getAllComments();
        return view('comments.index', compact('comments'));
    }
    public function show($id)
    {
        $this->authorize('haveaccess', 'comment.show');
        $comment = $this->comment->getCommentById($id);
        return view('comments.view', compact('comment'));
    }
    public function destroy($id)
    {
        $this->authorize('haveaccess', 'comment.delete');
        $this->comment->changeState($id);
        return redirect()->route('comment.index');
    }
}
