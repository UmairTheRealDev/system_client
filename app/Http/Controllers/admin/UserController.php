<?php

namespace App\Http\Controllers\admin;

use App\Constants\Messages;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::where('type', '!=', 'Admin')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'contact_no' => ['required', 'unique:users,contact_no'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'contact_no' => $request->contact_no,
            'type' => 'User',
        ];

        $is_created = User::create($data);

        $is_created ? $message = ['success' => 'User' . Messages::ADD_SUCCESS] : $message = ['failure' => 'User' . Messages::ADD_FAILURE];

        return back()->with($message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'contact_no' => ['required', 'unique:users,contact_no'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'type' => 'User',
        ];

        $is_updated = $user->update($data);

        $is_updated ? $message = ['success' => 'User' . Messages::EDIT_SUCCESS] : $message = ['failure' => 'User' . Messages::EDIT_FAILURE];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $is_deleted = $user->delete();

        $is_deleted ? $message = ['success' => 'User' . Messages::DELETE_SUCCESS] : $message = ['failure' => 'User' . Messages::DELETE_FAILURE];

        return back()->with($message);
    }
}
