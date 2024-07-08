<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with(['user', 'product'])->orderBy('created_at','desc')->paginate(10);

        $title = 'Order Management';
        $navTitle = 'Order';
        return view('Admin.order.index', [
            'title' => $title,
            'navTitle' => $navTitle,
            'orders' => $orders
        ]);
    }

    public function fileDownload($file)
    {
        //check if file did not exist
        if (!file_exists(public_path('files/' . $file))) {
            return redirect()->back()->with('danger', 'File not found');
        }
        return response()->download(public_path('files/' . $file));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.order')->with('error', 'Order not found');
        }
        $order->status = $request->status;
        if ($order->status == 'cancelled') {
            $payment = Payment::where('order_id', $order->id)->first();
            $payment->status = 'pending';
            $payment->save();
        }
        $order->save();

        return redirect()->route('admin.order')->with('success', 'Order status updated');
    }

    public function store(Request $request, $id)
    {
        $validate = $request->validate([
            'size' => 'required',
            'material' => 'required',
            'file' => 'required',
            'pages' => 'required',
            'quantity' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('files'), $fileName);
            $validate['file'] = $fileName;
        } else {
            return redirect()->back()->with('error', 'File not found');
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $product = Product::find($id);
        $order->product_id = $product->id;
        $order->material = $validate['material'];
        $order->size = $validate['size'];
        $order->file = $validate['file'];
        $order->pages = $validate['pages'];
        $order->quantity = $validate['quantity'];
        $order->price = $product->price * $validate['pages'] * $validate['quantity'];
        $order->status = 'pending';
        $order->save();

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ]);
    }
}
