<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
//use App\Models\Colors;
use App\Models\Product;
//use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\StoreRequest;

class ProductController
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('categories', 'product'));
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

//        foreach ($productImages as $productImage){
//            $currentImagesCount = ProductImage::where('product_id', $product->id)->count();
//
//            if ($currentImagesCount > 3) continue;
//            $filePath = Storage::disk('public')->put('/images', $productImage);
//            ProductImage::create([
//                'product_id' => $product->id,
//                'file_path' => $filePath,
//            ]);
//        }

        return redirect()->route('product.index');
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (array_key_exists('preview_image', $data)) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $product->update($data);

        return view('admin.product.show', compact('product'));
    }
}


