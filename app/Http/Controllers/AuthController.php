<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );


        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            Log::channel('auth')->info($validated['email'] . ' (ID:' . auth()->id() . ') Logged in');
            return redirect()->route('dashboard')->with('success', 'Logged in');
        }

        Log::channel('auth')->info($validated['email'] . ' Failed to log in');
        return redirect()->route('login')->withErrors(
            [
                'email' => "No matching user found with the provided email and password"
            ]
        );
    }

    public function logout(){
        $userId = auth()->id();
        Log::channel('auth')->info(auth()->user()->email . ' (ID:' . $userId . ') Logged out');
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out');
    }

    public function store(){
        $rules = [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8'
        ];
        $validator = Validator::make(request()->all(), $rules);
        if($validator->fails()){
            if(!$validator->getMessageBag()->has('email')){
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();          
            }
        }else{
            $validated = $validator->validated();
            $user = User::create([
                'name' => $validated['name'],
                'email' =>$validated['email'],
                'password' => Hash::make($validated['password'])
            ]);
            Mail::to($user->email)->send(new WelcomeMail($user));
        }
         return redirect()->route('dashboard')->with('success', 'If everything went well, you will soon receive an e-mail confirming your registration');
    }
}
