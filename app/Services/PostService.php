<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    protected $post;
    public function __construct()
    {
        $this->post = new Post;
    }
    //queries
    public function getPost()
    {
        return $this->post->where('state',1)->get();
    }
    public function findPost($id)
    {
        return $this->post->findOrFail($id);  
    }
    public function listPostComment()
    {
        return $this->post->get();
    }
    //methods
    public function index()
    {
        return $this->getPost();
    }
    public function store($request)
    {
        $this->post->create(['post'=>$request->post,'user_id'=>$request->user_id,'category_id'=>$request->category_id]);
    }
    public function update($request,$id)
    {
        $post = $this->findPost($id);
        $post->update($request->all());
    }
    public function show($id)
    {
        return $this->findPost($id);
    }
    public function delete($id)
    {
        $post = $this->findPost($id);
        $post->delete();
    }
    public function changeState($id)
    {
        $post = $this->findPost($id);
        $post->update(['state'=>'0']);
    }
}
