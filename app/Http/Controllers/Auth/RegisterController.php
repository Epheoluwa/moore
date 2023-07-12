<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validation\ValidationController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/registration');
    }

    public function register(Request $request, ValidationController $validationController)
    {
        $validator = $validationController->RegistrationValidation($request);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'role' => $request->role,
            'email' => $request->Email,
            'firstname' => $request->FirstName,
            'lastname' => $request->LastName,
            'password' => Hash::make($request->Password),
        ];

        try {
            $created = User::create($data);
            if ($created) {
                $credentials = $request->only('Email', 'Password');
                $login =  Auth::attempt($credentials);
                if ($login) {
                    return redirect()->route('/')->with('success', 'Registration successful');
                }

                return redirect()->route('/')->with('success', 'Registration successful');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Unexpected error while creating account');
        }
    }
}
