<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $title = 'Account';
        $navTitle = 'Account';
        return view('user.index', [
            'title' => $title,
            'navTitle' => $navTitle,
            'user' => $user
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $title = 'Profile';
        $navTitle = 'Account';
        return view('account.profile', [
            'title' => $title,
            'navTitle' => $navTitle,
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'address' => 'required'
        ]);

        if ($user->email != $validate['email']) {
            $validate['email'] = $user->email;
        }

        $user->name = $validate['name'];
        $user->phone = $validate['phone'];
        $user->address = $validate['address'];
        $user->save();
        return redirect()->route('account.profile')->with('success', 'Profile updated');
    }

    public function order()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        $title = 'Order History';
        $navTitle = 'Account';
        return view('account.order', [
            'title' => $title,
            'navTitle' => $navTitle,
            'orders' => $orders
        ]);
    }

    public function orderDetail($id)
    {
        $user = auth()->user();
        $order = Order::find($id);
        if ($order->user_id != $user->id) {
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

    public function payment()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        $orderIds = $orders->pluck('id')->toArray(); // Convert collection to array
        $payments = Payment::whereIn('order_id', $orderIds)->paginate(10); // Use whereIn for multiple values
        $title = 'Payment History';
        $navTitle = 'Account';


        return view('account.payment', [
            'title' => $title,
            'navTitle' => $navTitle,
            'payments' => $payments // Corrected variable name to 'payments'
        ]);
    }
}
