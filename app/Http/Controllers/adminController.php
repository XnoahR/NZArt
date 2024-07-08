<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    //
    public function user()
    {
        $users = User::where('role', 'user')->paginate(10);

        $title = 'User Management';
        $navTitle = 'User';
        return view('Admin.user.index', [
            'users' => $users,
            'title' => $title,
            'navTitle' => $navTitle
        ]);
    }


    public function edit($id)
    {
        $user = User::find($id);
        $title = 'Edit ' . $user->name . ' Data';
        $navTitle = 'User';
        return view(
            'Admin.user.edit',
            [
                'user' => $user,
                'title' => $title,
                'navTitle' => $navTitle
            ]
        );
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($request->id);
        if (!$user) {
            return redirect()->route('admin.user')->with('error', 'User not found');
        }

        $user->name = $validate['name'];
        $user->phone = $validate['phone'];
        $user->address = $validate['address'];
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Data successfully updated');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.user')->with('error', 'User not found');
        }
        $user->delete();
        return redirect()->route('admin.user')->with('danger', 'Data successfully deleted');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('session.login');
    }
}
