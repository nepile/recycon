<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function change_password_handle(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:5', 'confirmed']
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            Auth::user()->update(['password' => Hash::make($request->password)]);
            return redirect(route('show_product'))->with('success', 'Password changed successfully');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your password does not match with our record'
        ]);
    }
}
