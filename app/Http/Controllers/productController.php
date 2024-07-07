<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Sluggable;
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
        $title = 'Add New Product';
        $navTitle = 'Product';
        return view('Admin.product.create', [
            'title' => $title,
            'navTitle' => $navTitle
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $fileName);
            $filePath = 'img/' . $fileName; // Store path relative to public
            $validate['image'] = $filePath;
        }
        else {
            return redirect()->route('admin.createProduct')->with('error', 'Please upload an image');
        }

        if (!$validate) {
            return redirect()->route('admin.createProduct')->with('error', 'Failed to add product');
        }
        //please fill the box
        // Create new product
        Product::create($validate);

        return redirect()->route('admin.product')->with('success', 'Product added successfully');
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
        $product->slug = str()->slug($validate['name'] . '-' . number_format(rand(0, 9999)));
        $product->price = $validate['price'];
        $product->stock = $validate['stock'];
        $product->description = $validate['description'];
        $product->image = $validate['image'];
        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product data updated successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.product')->with('error', 'Product not found');
        }

        $product->delete();

        return redirect()->route('admin.product')->with('danger', 'Product deleted successfully');
    }
}
