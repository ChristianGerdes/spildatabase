<?php

namespace App\Http\Controllers;

use App\User;

class AdminsController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('admins.index', compact('users'));
    }

    public function store(User $user)
    {
        $user->update(['role' => 2]);

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->update(['role' => 1]);

        return redirect()->back();
    }
}
