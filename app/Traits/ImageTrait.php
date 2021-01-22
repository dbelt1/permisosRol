<?php

namespace App\Traits;

trait ImageTrait
{
   public function saveImage($images,$link)
   {
       $route = [];
       foreach($images as $image)
       {
           $nombre = time() . '_' .$image->getClientOriginalName();
           $ruta = storage_path($link);
           $image->move($ruta,$nombre);
           $route[]['route'] = $nombre;
       }
       return $route;
   } 
}