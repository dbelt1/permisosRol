<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $category;
    public function __construct()
    {
        $this->category = new CategoryService;
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $this->authorize('haveaccess', 'category.index');
        $categories = $this->category->getAllCategory();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        $this->authorize('haveaccess', 'category.create');
        return view('categories.create');
    }
    public function store(CategoryRequest $request)
    {
        $this->authorize('haveaccess', 'category.create');
        $this->category->store($request);
        return redirect()->route('category.index');
    }
    public function edit($id)
    {
        $this->authorize('haveaccess', 'category.edit');
        $category = $this->category->getCategoryById($id);
        return view('categories.edit',compact('category'));
    }
    public function update(CategoryRequest $request,$id)
    {
        $this->authorize('haveaccess', 'category.edit');
        $this->category->update($request,$id);
        return redirect()->route('category.index');
    }
    public function show($id)
    {
        $this->authorize('haveaccess', 'category.show');
        $category = $this->category->getCategoryById($id);
        return view('categories.view',compact('category'));
    }
    public function destroy($id)
    {
        $this->authorize('haveaccess', 'category.delete');
        $this->category->delete($id);
        return redirect()->route('category.index');
    }
}
