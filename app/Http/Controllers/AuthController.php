<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateTokenRequest;
use App\Mail\PasswordResetMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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

        if($this->isEmailAlreadyTaken($validator)){
            return redirect()->route('dashboard')->with('success', 'If everything went well, you will soon receive an e-mail confirming your registration');
        }

        if($validator->fails()){
            $errors = $validator->getMessageBag();
            
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();     
        }

        $validated = $validator->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' =>$validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));

        return redirect()->route('dashboard')->with('success', 'If everything went well, you will soon receive an e-mail confirming your registration');
    }
    public function isEmailAlreadyTaken(\Illuminate\Validation\Validator $validator):bool{
        $errors = $validator->getMessageBag();
        return $validator->fails() && $errors->get('email') && $errors->get('email')[0] == 'The email has already been taken.';
    }

    public function forgot_password(){
        return view('auth.forgot_password');
    }
    public function sendPasswordResetToken(GenerateTokenRequest $request){    
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if($user){
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            $token = Str::random(48);
            DB::table('password_reset_tokens')->insert([
                'email' =>$request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $link = Env('APP_URL') . '/restart-password/' . $token;
            Mail::to($email)->send(new PasswordResetMail($link));
        }
        return redirect()->route('forgot_password')->with('success', 'If everything went well, you will soon receive an e-mail with link to restart your passowrd');
    }
    public function restartPassword($token){
        return view('auth.restart_password', compact('token'));
    }
    public function changePassword($token){
        $rules = [
                'password' => 'required|confirmed|min:8'
        ];
        $validator = Validator::make(request()->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();       
        }
        $validated = $validator->validated();
        $password = $validated['password'];
        
        $tokenData = DB::table('password_reset_tokens')
        ->where('token', $token)->first();
   
        $user = User::where('email', $tokenData->email)->first();
        if ( !$user ) return redirect()->route('dashboard')->with('error', 'failed to change password');
   
        $user->password = Hash::make($password);
        $user->update();

        DB::table('password_reset_tokens')->where('email', $user->email)->delete();
        
         return redirect()->route('dashboard')->with('success', 'password change completed successfully');
    }
}
