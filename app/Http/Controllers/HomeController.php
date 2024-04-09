<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function products(Category $category)
    {
//        $products = $category->products()->get();
        $categories = Category::all();
        $products = $category->products()->paginate(10);
        return view('category.products', compact('products', 'categories'));
    }

    public function product($postId)
    {
        $product = Product::findOrFail($postId);
        $categories = Category::all();
        return view('post.show', compact('product','categories'));
    }

}
