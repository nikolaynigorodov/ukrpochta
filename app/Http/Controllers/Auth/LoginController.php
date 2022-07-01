<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(auth("web")->attempt($request->validated())) {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email" => "The user was not found, or the data was entered incorrectly"]);
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }
}
