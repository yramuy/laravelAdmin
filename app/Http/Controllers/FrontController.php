<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\SubCategory;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function dashboard()
    {
        return view('front.dashboard');
    }

    public function users()
    {
        return view('front.users');
    }
    public function login_page()
    {
        return view('front.login');
    }
    public function logout_page()
    {
        // Flush all session data
        session()->flush();
        return Redirect::route('login');
    }

    public function categoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string|max:255'
        ]);

        $category = new Category();
        $category->name = $validatedData['category'];
        $category->save();

        return Redirect::route('category/list')->with('success', 'Category saved successfully');
    }

    public function category_list() {
        $categories = Category::orderBy('id', 'desc')->get();
        // print_r($categories);die;
        // return response()->json($categories);

        return view('front.category', compact('categories'));
    }

    public function category_edit($id) {
        $category = Category::find($id);

        // echo $category->name;die;

        return  view('front.category', compact('category', 'id'));
    }
}
