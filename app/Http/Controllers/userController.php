<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $user = auth()->user();
        $title = 'Account';
        $navTitle = 'Account';
        return view('user.index', [
            'title' => $title,
            'navTitle' => $navTitle,
            'user' => $user
        ]);
    }

    public function profile(){
        $user = auth()->user();
        $title = 'Profile';
        $navTitle = 'Account';
        return view('account.profile', [
            'title' => $title,
            'navTitle' => $navTitle,
            'user' => $user
        ]);
    }

    public function order(){
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(10);
        $title = 'Order History';
        $navTitle = 'Account';
        return view('account.order', [
            'title' => $title,
            'navTitle' => $navTitle,
            'orders' => $orders
        ]);
    }

    public function orderDetail($id){
        $user = auth()->user();
        $order = Order::find($id);
        if($order->user_id != $user->id){
            return redirect()->route('account.order')->with('error', 'You are not authorized to access this page');
        }
        $title = 'Order Detail';
        $navTitle = 'Account';
        return view('account.orderDetail', [
            'title' => $title,
            'navTitle' => $navTitle,
            'order' => $order
        ]);
    }
}
