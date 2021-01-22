<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use App\Http\Requests\PlaceRequest;

class PlaceController extends Controller
{
    protected $place;

    public function __construct()
    {
        $this->place = new PlaceService;
    }
    public function index()
    {
        $places = $this->place->getPlace();
        return view('places.index',compact('places'));
    }
    public function create()
    {
        return view('places.create');
    }
    public function store(PlaceRequest $request)
    {
        $this->place->store($request);
        return redirect()->route('places.index');
    }
    public function edit($id)
    {
        $place = $this->place->getPlaceById($id);
        return view('places.edit',compact('place'));
    }
    public function update(PlaceRequest $request, $id)
    {
        $this->place->update($request,$id);
        return redirect()->route('place.index');
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
