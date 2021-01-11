<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\policies\PostPolicy;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use App\Services\CategoryService;

class PostController extends Controller
{
    protected $post, $prueba;
    public function __construct()
    {
        $this->post = new PostService;
        $this->prueba = new PostPolicy;
        $this->category = new CategoryService;
    }
    public function index()
    {
        $this->authorize('haveaccess', 'post.index');
        $posts = $this->post->index();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        $this->authorize('haveaccess', 'post.create');
        $categories = $this->category->getCategory();
        return view('posts.create',compact('categories'));
    }
    public function store(PostRequest $request)
    {
        $this->authorize('haveaccess', 'post.create');
        $this->post->store($request);
        return redirect()->route('post.index')->with('La publicación ha sido guardada con éxito');
    }
    public function edit($id)
    {
        $post = $this->post->findPost($id);
        $categories = $this->category->getCategory();
        $this->authorize('edit', [$post, ['post.edit', 'postown.edit']]);
        return view('posts.edit',compact('post','categories'));
    }
    public function update(PostRequest $request, $id)
    {
        $post = $this->post->findPost($id);
        $this->authorize('edit', [$post, ['post.edit', 'postown.edit']]);
        $this->post->update($request, $id);
        return redirect()->route('post.index')->with('La publkicación ha sido actualizada correctamente');
    }
    public function show($id)
    {
        $post = $this->post->findPost($id);
        $categories = $this->category->getCategory();
        $this->authorize('view', [$post, ['post.show', 'postown.show']]);
        $post = $this->post->show($id);
        return view('posts.show',compact('post','categories'));
    }
    public function destroy($id)
    {
        $this->authorize('haveaccess', 'post.delete');
        $this->post->changeState($id);
        return redirect()->route('post.index')->with('state_success','La publicación ha sido eliminada correctamente');
    }
}
