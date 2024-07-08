<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class catalogController extends Controller
{
    //
    public function index()
    {
        $title = 'Katalog';
        $navTitle = 'Catalog';
        $products = Product::orderBy('created_at','desc')->paginate(12);
        return view(
            'Catalog.index',
            [
                'title' => $title,
                'navTitle' => $navTitle,
                'products' => $products
            ]
        );
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $title = $product->name;
        $navTitle = 'Catalog';
        return view(
            'Catalog.product',
            [
                'title' => $title,
                'navTitle' => $navTitle,
                'product' => $product
            ]
        );
    }
}
