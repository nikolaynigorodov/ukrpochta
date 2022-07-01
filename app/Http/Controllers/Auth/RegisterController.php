<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->validated());

        if($user) {

            auth("web")->login($user);
        }

        return redirect(route("home"));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
