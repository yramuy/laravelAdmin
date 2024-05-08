<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        if ($categories->count() > 0) {
            return response()->json(array("status" => 200, "categories" => $categories), 200);
        } else {
            return response()->json(array("status" => 404, "message" => "No Records Found"), 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            if ($category) {
                return response()->json([
                    'status' => 200,
                    'message' => "Category stored successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong!"
                ], 500);
            }
        }
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
