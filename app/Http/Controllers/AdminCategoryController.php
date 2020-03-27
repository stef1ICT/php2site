<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    



    public function index() {
        $this->authorize('isAdmin');
        $categories = Category::all();
        return view('Admin.Category.index', ['categories' => $categories]);
    }


    public function show(Category $category) {
        $this->authorize('isAdmin');
        $products = $category->products()->paginate(6);
     
        return view('Admin.Category.show',['category' => $category, 'products'=>$products]);
    }



    public function create() {
        $this->authorize('isAdmin');
        return view('Admin.Category.create');
    }



    public function store() {
        $this->authorize('isAdmin');
       Category::create([
        'categoryName' => request('name')
       ]);
       return redirect()->back()->with('message', 'Category created!');
    }
}
