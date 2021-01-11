<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    protected $category;
    public function __construct()
    {
        $this->category = new Category;
    }
    //queries
    public function getCategory()
    {
        return $this->category->get(['id','name']);
    }
}