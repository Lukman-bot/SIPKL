<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Product 1'],
            ['id' => 2, 'name' => 'Product 2'],
            ['id' => 3, 'name' => 'Product 3'],
        ];
        return view('product.index', ['products' => $products]);
    }
}
