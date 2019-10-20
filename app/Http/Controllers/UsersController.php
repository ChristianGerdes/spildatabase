<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreUserRequest;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->only('name', 'email', 'password'));

        auth()->login($user);
    }
}
