<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function edit_profile_handle(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'email' => 'required|email'
        ]);

        try {
            $user = User::find($id);

            $user->username = $request->username;
            $user->email = $request->email;

            $user->save();

            return redirect()->route('show_product')->with('success', 'Successfully updated profile');
        } catch (Exception $e) {
            return redirect()->route('show_product')->with('error', 'The email you entered is already registered!');
        }
    }
}
