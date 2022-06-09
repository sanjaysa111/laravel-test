<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.manage', compact('user'));
    }

    public function updateUserProfile(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date_format:Y-m-d' ],
        ]);

        User::query()
                ->where('id', auth()->user()->id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'dob' => $request->dob,
                ]);

        return redirect()->route('home');
    }
}
