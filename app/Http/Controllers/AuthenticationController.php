<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Settings;
//use App\Models\User;

class AuthenticationController extends Controller
{

    function index(){
        $settings = Settings::all();

        if(!(Auth::check()))
        {
            return view('authentication\login', array('settings' => $settings));
        }
        else{
            return redirect('dashboard');
        }
    }

    function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
                
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Login Successful!',
                        'redirect' => 'dashboard');
        }
        else{
            return array('result' => 'Error',
                        'color' => 'red',
                        'message' => 'Incorrect user credentials!');
        }
        
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
