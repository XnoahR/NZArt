<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with(['user', 'product'])->paginate(10);

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
}
