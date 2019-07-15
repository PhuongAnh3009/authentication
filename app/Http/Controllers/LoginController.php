<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Fill the email',
            'email.email' => 'Email is not correct form',
            'password.required' => 'Fill your password',
            'password.min' => 'Password must be at least 8 characters'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response() -> json([
                'error' => true,
                'message' => $validator -> errors()
            ], 200);
//            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $email,'password' => $password], $request -> has('remember'))) {
                return response() -> json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
//              return redirect() -> intended('/');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email or password is not correct !!! ']);
//                 return redirect() -> back() -> withInput() -> withErrors($errors);
                return response() -> json([
                    'error' => true,
                    'message' => $errors
                ], 200);
            }
        }
    }
}
