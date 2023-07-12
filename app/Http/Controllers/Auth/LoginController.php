<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validation\ValidationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request, ValidationController $validationController)
    {
        $validator = $validationController->LoginValidation($request);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('/')->with('success', 'Login successful');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
