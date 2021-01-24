<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use App\Services\CategoryService;
use App\Http\Requests\PlaceRequest;
use App\Services\PhotoService;
use App\Traits\ImageTrait;
class TimelineController extends Controller
{
    protected $timeline;

    public function __construct()
    {
        $this->timeline = new PlaceService;
        $this->category = new CategoryService;
        $this->photo = new PhotoService;
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $this->authorize('haveaccess', 'place.index');
        $places = $this->timeline->index(1);
        return view('timelines.index',compact('places'));
    }
    public function create()
    {
        $this->authorize('haveaccess', 'place.create');
        $categories = $this->category->getAllCategory();
        return view('timelines.create',compact('categories'));
    }
    public function store(PlaceRequest $request)
    {
        $this->authorize('haveaccess', 'place.create');
        if($request->category_id === 'seleccionar'){
            return back();
        }else{
            $route = $this->photo->saveOneImage($request->images);
            $this->timeline->store($request,$route,1);
            return redirect()->route('timeline.index');
        }
    }
    public function edit($id)
    {
        $this->authorize('haveaccess', 'place.edit');
        $place = $this->timeline->getPlaceById($id);
        $categories = $this->category->getAllCategory();
        return view('timelines.edit',compact('place','categories'));
       
    }
    public function update(PlaceRequest $request, $id)
    {
        $this->authorize('haveaccess', 'place.edit');
        if($request->category_id === 'seleccionar'){
            return back();
        }else{
            $route = $this->photo->saveOneImage($request->images);
            $this->timeline->update($request,$id,$route,1);
            return redirect()->route('timeline.index');
        }   
    }
    public function show($id)
    {
        $this->authorize('haveaccess', 'place.show');
        $place = $this->timeline->getPlaceById($id);
        return view('timelines.view',compact('place'));
    }
    public function destroy($id)
    {
        $this->authorize('haveaccess', 'place.delete');
        $this->place->changeState($id);
        return redirect()->route('timeline.index');
    }
}
