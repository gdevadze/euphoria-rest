<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('pages.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = currentUser();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'მიმდინარე პაროლი არასწორია!');
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', 'პაროლი წარმატებით შეიცვალა!');
    }
}
