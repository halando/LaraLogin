<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showUpdateForm()
    {
        $user = Auth::user();
        return view('update_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'update_name' => 'required|string|max:255',
            'update_email' => 'required|email|unique:user_form,email,' . $user->id,
            'update_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'update_pass' => 'nullable|string|min:6',
            'new_pass' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('update_name');
        $user->email = $request->input('update_email');

        if ($request->hasFile('update_image')) {
            $image = $request->file('update_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded_img'), $imageName);
            $user->image = $imageName;
        }

        if ($request->filled('update_pass')) {
            if (password_verify($request->input('update_pass'), $user->password)) {
                $user->password = bcrypt($request->input('new_pass'));
            } else {
                return redirect()->back()->withErrors(['update_pass' => 'Old password does not match.'])->withInput();
            }
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }
}
