<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    //
    public function index()
    {
        $payments = Payment::with(['order', 'user'])->paginate(10);
        $title = 'Payment Management';
        $navTitle = 'Payment';
        return view('Admin.payment.index', [
            'title' => $title,
            'navTitle' => $navTitle,
            'payments' => $payments
        ]);
    }

    public function view($id)
    {
        $order = Order::find($id);
        $title = 'Payment Details';
        $navTitle = 'Payment';
        return view('Admin.payment.view', [
            'title' => $title,
            'navTitle' => $navTitle,
            'order' => $order
        ]);
    }

    public function payment($id)
    {
        $payment = Payment::find($id);
        $order = Order::find($payment->order_id);
        if ($order->user_id != auth()->user()->id) {
            return redirect()->route('home')->with('error', 'You are not authorized to access this page');
        }
        $title = 'Bayar Pesanan';
        $navTitle = 'Catalog';
        return view('payment', [
            'title' => $title,
            'navTitle' => $navTitle,
            'order' => $order,
            'payment' => $payment
        ]);
    }

    public function pay(Request $request, $id)
    {
        $validate = $request->validate([
            'proof' => 'required',
            'payment_method' => 'required',
        ],
        [
            'proof.required' => 'Bukti pembayaran harus diisi',
            'payment_method.required' => 'Metode pembayaran harus diisi',
        ]);
        $payment = Payment::find($id);
        $order = Order::find($payment->order_id);
        if ($order->user_id != auth()->user()->id) {
            return redirect()->route('home')->with('error', 'You are not authorized to access this page');
        }
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('files', $filename);
            $validate['proof'] = $filename;
        } else {
            return redirect()->back()->with('error', 'File not found');
        }
        $payment->payment_method = $validate['payment_method'];
        $payment->proof = $validate['proof'];
        $payment->paid_at = now();
        $payment->status = 'paid';
        $payment->save();
        

        return response()->json(['message' => 'Payment success']);
    }
}
