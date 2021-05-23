<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.categories', ['categories' => Category::with('trips')->get()]);
    }
	
	public function getAddCategory()
	{
		return view('admin.add-category', ['categories' => Category::all()]);
        // return view('admin.add-category');
	}

    public function getEditCategory (Category $category) 
    {
        return view('admin.edit-category', ['category' => $category], ['categories' => Category::all()]);
    }

    public function createNewCategory(Request $request)
    {
        // return $request->input();
        $category = new Category;
        $category->name = $request->category_name;
        $category->slug = $request->category_slug;
        $category->save();
        return redirect('admin/edit-category/' . $category->slug)->with('status', "Category {$category->name} has been added successfully");
    }

    public function updateCategory(Request $request)
    {
        // return $request;
        $category = Category::find($request->category_id);
        // $to_delete_trip = Trip::find($request->trip_id);
        $category->name = $request->category_name;
        $category->slug = $request->category_slug;
        $category->save();

        //run the eloquent sql
        return redirect("admin/edit-category/{$category->slug}")->with('status', "Category {$category->name} updated successfully!");
    }

}
