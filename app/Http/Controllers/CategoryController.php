<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getMainCategories()
    {
        $categories = Category::whereNull('parent_id')->get();

        return response()->json($categories);
    }

    public function getSubCategories(Request $request)
    {
        $parent_id = $request->input('parent_id');

        $subcategories = Category::where('parent_id', $parent_id)->get();

        return response()->json($subcategories);
    }
}
