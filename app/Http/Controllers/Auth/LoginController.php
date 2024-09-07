<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){

        return view('auth.login');
    }

    public function login(Request $request){


        $credentials = $request->validate([
            'name'=>['required', 'string'],
            'email'=>['required', 'string', 'email'],
            'password'=>['required', 'string', 'min:4'],
        ]);

        $remember = $request->boolean('remember');

        if(!Auth::attempt($credentials, $remember)){
            //return back()
            //    ->withInput()
            //    ->withErrors([
            //        'email'=> 'Веденные данные не соотвествуют действительности'
            //]);

            throw ValidationException::withMessages([
                'email'=> trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME);
    }

        
    
}
