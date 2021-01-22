<?php

namespace App\Services;

use App\Models\Place;

class PlaceService
{
    protected $place;
    public function __construct()
    {
        $this->place = new Place;
    }
    //queries
    public function getPlace()
    {
        return $this->place->where('state',1)->get(['id', 'name']);
    }
    public function getPlaceById($id)
    {
        return $this->place->findOrFail($id);
    }
    public function index()
    {
        return $this->getPlace();
    }
    public function store($request)
    {
        $this->place->create($request->all());
    }
    public function update($request, $id)
    {
        $place = $this->getPlaceById($id);
        $place->update($request->all());
    }
    public function show($id)
    {
        return $this->getPlaceById($id);
    }
    public function delete($id)
    {
        $post = $this->getPlaceById($id);
        $post->delete();
    }
    public function changeState($id)
    {
        $post = $this->getPlaceById($id);
        $post->update(['state' => 0]);
    }
}
