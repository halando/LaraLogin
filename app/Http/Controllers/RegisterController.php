<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_form',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        $user = new \App\Models\UserForm;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded_img'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('login')->with('success', 'Registered successfully!');
    }
}
