<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(LoginUserRequest $request)
    {
        auth()->attempt($request->only('email', 'password'), true);

        return redirect()->back();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->back();
    }
}
