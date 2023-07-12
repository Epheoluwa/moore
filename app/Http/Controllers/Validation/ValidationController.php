<?php

namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    public function RegistrationValidation(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'FirstName' => 'required',
                'LastName' => 'required',
                'Email' => 'required|email|unique:users',
                'Password' => 'required|min:8',
                'role' => 'required',
            ],
            [
                'FirstName.required' => 'First Name is a required field',
                'LastName.required' => 'Last Name is a required field',
                'Email.required' => 'Email address is required',
                'Email.unique:users' => 'Email address already exist',
                'Password.required' => 'Passowrd is required to keep your account secure',
                'role.required' => 'Please specify a role',
            ]
        );

        return $validator;
    }

    public function LoginValidation(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'Email address is required to login',
                'password.required' => 'Passowrd is required to login',
            ]
        );

        return $validator;
    }

    public function TaskValidation(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'team' => 'required',
            ],
            [
                'title.required' => 'Title is a required field',
                'description.required' => 'Description is a required field',
                'team.required' => 'Teams is required',
            ]
        );

        return $validator;
    }

    public function TaskUpdateValidation(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'team' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Title is a required field',
                'description.required' => 'Description is a required field',
                'team.required' => 'Teams is required',
                'status.required' => 'Status is required',
            ]
        );

        return $validator;
    }
}
