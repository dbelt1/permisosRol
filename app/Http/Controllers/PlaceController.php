<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use App\Services\CategoryService;
use App\Http\Requests\PlaceRequest;
use App\Services\PhotoService;
use App\Traits\ImageTrait;
class PlaceController extends Controller
{
    protected $place;

    public function __construct()
    {
        $this->place = new PlaceService;
        $this->category = new CategoryService;
        $this->photo = new PhotoService;
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $this->authorize('haveaccess', 'place.index');
        $places = $this->place->index(0);
        return view('places.index',compact('places'));
    }
    public function create()
    {
        $this->authorize('haveaccess', 'place.create');
        $categories = $this->category->getAllCategory();
        return view('places.create',compact('categories'));
    }
    public function store(PlaceRequest $request)
    {
        if($request->category_id === 'seleccionar'){
            return back();
        }else{
            $route = $this->photo->saveOneImage($request->images);
            $this->place->store($request,$route,0);
            return redirect()->route('place.index');
        }
    }
    public function edit($id)
    {
        $place = $this->place->getPlaceById($id);
        $categories = $this->category->getAllCategory();
        return view('places.edit',compact('place','categories'));
       
    }
    public function update(PlaceRequest $request, $id)
    {
        if($request->category_id === 'seleccionar'){
            return back();
        }else{
            $route = $this->photo->saveOneImage($request->images);
            $this->place->update($request,$id,$route,0);
            return redirect()->route('place.index');
        }   
    }
    public function show($id)
    {
        $place = $this->place->getPlaceById($id);
        return view('places.view',compact('place'));
    }
    public function destroy($id)
    {
        $this->place->changeState($id);
        return redirect()->route('place.index');
    }
}
