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
    public function getPlace($timeline)
    {
        return $this->place->where('state',1)->where('timeline',$timeline)->get(['id','createdDate','name','description','image']);
    }
    public function getPlaceById($id)
    {
        return $this->place->findOrFail($id);
    }
    //linea de tiempo solo para el frontend del usuario
    public function getTimeline()
    {
        return $this->place->where('state',1)->where('timeline',1)->orderBy('createdDate','DESC')->get(['id','createdDate','name','description','image']);
    }
    //metodos
    public function index($timeline)
    {
        return $this->getPlace($timeline);
    }
    public function store($request,$route,$timeline)
    {
        $this->place->create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'length'=>$request->length,
            'latitude'=>$request->latitude,
            'createdDate'=>$request->createdDate,
            'timeline' => $timeline,
            'image'=>$route,
        ]);
    }
    public function update($request, $id,$route,$timeline)
    {
        $place = $this->getPlaceById($id);
        $place->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'length'=>$request->length,
            'latitude'=>$request->latitude,
            'timeline' => $timeline,
            'image'=> $route !== null ? $route : $place->image,
            'createdDate'=>$request->createdDate,
        ]);
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
