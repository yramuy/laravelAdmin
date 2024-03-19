<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AppApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(array("categories" => $categories));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json($category);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json(array("category" => $category));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return response()->json($category);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(array("status" => 1, "message" => "deleted success"));
    }
}
