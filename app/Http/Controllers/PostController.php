<?php

namespace App\Http\Controllers;

use App\Services\PhotoService;
use App\policies\PostPolicy;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use App\Services\PlaceService;

class PostController extends Controller
{
    protected $post,$photo;
    public function __construct()
    { 
        $this->post = new PostService;
        $this->place = new PlaceService;
        $this->photo = new PhotoService;
        $this->middleware(['auth','verified']);
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
        $places = $this->place->getplace();
        return view('posts.create',compact('places'));
    }
    public function store(PostRequest $request)
    {
        $this->authorize('haveaccess', 'post.create');
        $post = $this->post->store($request);
        $route = $this->photo->savePhoto($request->images);
        $post->photos()->createMany($route);
        return redirect()->route('post.index')->with('La publicación ha sido guardada con éxito');
    }
    public function edit($id)
    {
        $post = $this->post->findPost($id);
        $places = $this->place->getplace();
        $this->authorize('edit', [$post, ['post.edit', 'postown.edit']]);
        return view('posts.edit',compact('post','places'));
    }
    public function update(PostRequest $request, $id)
    {
        $post = $this->post->findPost($id);
        $this->authorize('edit', [$post, ['post.edit', 'postown.edit']]);
        $this->post->update($request, $id);
        $this->photo->savePhoto($request->images);
        return redirect()->route('post.index')->with('La publicación ha sido actualizada correctamente');
    }
    public function show($id)
    {
        $post = $this->post->findPost($id);
        $places = $this->place->getplace();
        $this->authorize('view', [$post, ['post.show', 'postown.show']]);
        $post = $this->post->show($id);
        return view('posts.show',compact('post','places'));
    }
    public function destroy($id)
    {
        $this->authorize('haveaccess', 'post.delete');
        $this->post->changeState($id);
        return redirect()->route('post.index')->with('state_success','La publicación ha sido eliminada correctamente');
    }
}
