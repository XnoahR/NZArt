<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function user()
    {
        $users = User::where('role', 'user')->paginate(10);

        $title = 'User Management';
        $navTitle = 'User';
        return view('Admin.user', [
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
            'Admin.edit',
            [
                'user' => $user,
                'title' => $title,
                'navTitle' => $navTitle
            ]
        );
    }

    public function store(Request $request)
    {
        // Validate the request
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Retrieve the user by ID
        $user = User::find($request->id);

        // Check if user exists
        if (!$user) {
            return redirect()->route('admin.user')->with('error', 'User not found');
        }

        // Update the user data
        $user->name = $validate['name'];
        $user->phone = $validate['phone'];
        $user->address = $validate['address'];
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Data successfully updated');
    }

    public function delete($id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->route('admin.user')->with('error', 'User not found');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('admin.user')->with('danger', 'Data successfully deleted');
    }
}
