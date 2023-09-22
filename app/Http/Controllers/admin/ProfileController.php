<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Constants\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function details(Request $request)
    {
        $admin = User::find(Auth::id());

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . Auth::id() . ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $is_updated = $admin->update($data);

        $is_updated ? $message = ['success' => 'Profile details' . Messages::EDIT_SUCCESS] : $message = ['failure' => 'Profile details' . Messages::EDIT_FAILURE];

        return back()->with($message);
    }

    public function password(Request $request)
    {
        $admin = User::find(Auth::id());

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            $data = [
                'password' => $request->password,
            ];

            $is_updated = $admin->update($data);

            $is_updated ? $message = ['success' => 'Password' . Messages::EDIT_SUCCESS] : $message = ['failure' => 'Password' . Messages::EDIT_FAILURE];

            return back()->with($message);
        } else {
            return back()->withErrors([
                'current_password' => 'Incorrect current password!',
            ]);
        }
    }
}
