<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function  v_login()
    {
        $data = [
            'title' => 'Portal Login',
            'id_page' => 'auth1'
        ];
        return view('pages.auth.login', $data);
    }

    public function login_handle(Request $request)
    {
        $validation = $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if (Auth::attempt($validation, $request->get('remember'))) {
            $request->session()->regenerate();
            if ($request->has('remember')) {
                Cookie::queue('email', $request->email, 1440);
                Cookie::queue('password', $request->password, 1440);
            }
            return redirect()->route('show_product');
        }

        return redirect()->back()->with('error', 'Incorrect email or password!');
    }

    public function v_register()
    {
        $data = [
            'title' => 'Register Form',
            'id_page' => 'auth2',
        ];
        return view('pages.auth.register', $data);
    }

    public function register_handle(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'customer'
        ]);

        return redirect()->route('login')->with('success', 'Register Successfully! Please login now');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
