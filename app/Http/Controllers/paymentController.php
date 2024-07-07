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
        $payments = Payment::with(['order','user'])->paginate(10);   
        $title = 'Payment Management';
        $navTitle = 'Payment';
        return view('Admin.payment.index', [
            'title' => $title,
            'navTitle' => $navTitle,
            'payments' => $payments
        ]);
    }

    public function view($id){
        $order = Order::find($id);
        $title = 'Payment Details';
        $navTitle = 'Payment';
        return view('Admin.payment.view', [
            'title' => $title,
            'navTitle' => $navTitle,
            'order' => $order
        ]);
    }
    
}
