<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Failed;
use App\Models\User;
use App\Http\Requests\RequestVal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Mail\EmailMessage;
use Error;
use Exception;
use Illuminate\Support\Facades\Hash;
use Str;
use Symfony\Component\Console\Input\Input;

class ProcessInformation extends Controller
{
    private $token;

    //Random code which is sent to user email address
    private function generateRandomStringNumbers($length)
    {
        $characters = '0123456789';

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|max:49',
                'password' => 'required|min:5|max:49'
            ],
        );


        if (Auth::attempt($request->only('email', 'password'))) {

            $theUser = Auth::user();

            Auth::login($theUser);      

            $theUser->update([
                'email_verified_at' => now(),
            ]);

            return redirect('welcome');
        } else {
            return redirect('deny');
        }
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:19|min:3',
                'email' => 'required|max:49|unique:users,email',
                'password' => 'required|min:5|max:49',
                'password_confirmation' => 'required|min:5|max:49|same:password',
            ],
        );

        $userObject = new User();

        $userObject->name = $request['name'];

        $userObject->email = $request['email'];

        $userObject->password = Hash::make($request['password']);

        $userObject->save();

        return redirect('/')
            ->with('registered', 'You registered successfully!');
    }

    public function handleForgottenPassword(Request $request)
    {
        $request->validate(
            ['email' => 'required|max:49'],
        );

        $the_user_email = User::where('email', '=', $request['email']);

        if ($the_user_email->exists()) {

            $code = $this->generateRandomStringNumbers(6);

            $given_email = $request['email'];

            $this->token = Str::random(64);

            session([
                'code' => $code,
                'email' => $given_email,
                $this->token => true
            ]);

            Mail::to($request['email'])
                ->send(new EmailMessage($code, 2));

            return redirect('resettingpassword');
        } else {
            return redirect('deny');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|max:6|min:6',
                'password' => 'required|min:5|max:49',
                'password_confirmation' => 'required|min:5|max:49|same:password'
            ],
        );

        if ((session('code') === $request['code']) && session()->has($this->token)) {
            DB::table('users')
                ->where('email', '=', session('email'))
                ->update(['password' => Hash::make($request['password_confirmation'])]);


            session()->forget([
                'code',
                'email',
                $this->token
            ]);

            return redirect('/')
                ->with('reset', 'Your password reset successfully!');
        } else {
            return redirect('deny');
        }
    }
}
