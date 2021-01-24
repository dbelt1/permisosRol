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
    public function getAllCategory()
    {
        return $this->category->get(['id','name','description']);
    }
    public function getCategoryById($id)
    {
        return $this->category->findOrFail($id);
    }
    public function store($request)
    {
        $this->category->create($request->all());
    }
    public function update($request,$id)
    {
        $category = $this->getCategoryById($id);
        $category->update($request->all());
    }
    public function delete($id)
    {
        $category = $this->getCategoryById($id);
        $category->delete();
    }
}