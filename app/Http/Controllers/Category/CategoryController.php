<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
		return view('category.index', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $data = $request->validated();
        
        // insert data
        $category                 = new Category;
        $category->name           = $data['name'];
        $category->description    = $data['description'];
        $category->save();
       
        // redirect
       // return back();
        // return redirect()->route('contacts.index'); 
        return redirect()->route('categories.index')->with('status', 'Categories has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $data = $request->validated();
        // update data
        
        $category->name             = $data['name'];
        $category->description      = $data['description'];
        $category->save();

        return redirect()->route('categories.index')->with('status', 'Categories has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)

    {
        //
         //
         $category->delete();
         // redirect
         return redirect()->route('categories.index')->with('status', 'Categories has been successfully deleted.');
    }
}
