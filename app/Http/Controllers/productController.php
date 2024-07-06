<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function index()
    {
        $title = 'Product Management';
        $navTitle = 'Product';
        $products = Product::paginate(10);
        return view('Admin.product.index', [
            'title' => $title,
            'navTitle' => $navTitle,
            'products' => $products
        ]);
    }

    public function create()
    {
        $title = 'Create Product';
        $navTitle = 'Product';
        return view('Admin.product.create', [
            'title' => $title,
            'navTitle' => $navTitle
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $title = 'Edit ' . $product->name . ' Data';
        $navTitle = 'Product';
        return view(
            'Admin.product.edit',
            [
                'product' => $product,
                'title' => $title,
                'navTitle' => $navTitle
            ]
        );
    }

    public function update(Request $request)
    {
        // Validate the request
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable',
            'description' => 'required',
        ]);

        // Retrieve the product by ID
        $product = Product::find($request->id);

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $fileName);
            $filePath = 'img/' . $fileName; // Store path relative to public
            $validate['image'] = $filePath;
        } else {
            $validate['image'] = $product->image;
        }
        // Check if product exists
        if (!$product) {
            return redirect()->route('admin.product')->with('error', 'Product not found');
        }

        // Update the product data
        $product->name = $validate['name'];
        $product->price = $validate['price'];
        $product->stock = $validate['stock'];
        $product->description = $validate['description'];
        $product->image = $validate['image'];
        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product data updated successfully');
    }
}
