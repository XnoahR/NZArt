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
        $orders = Order::where('user_id', $user->id)->paginate(10);
        $title = 'Order History';
        $navTitle = 'Account';
        return view('account.order', [
            'title' => $title,
            'navTitle' => $navTitle,
            'orders' => $orders
        ]);
    }
}
