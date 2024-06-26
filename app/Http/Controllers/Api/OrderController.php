<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($postId)
    {
        return Product::findOrFail($postId);
    }
}
