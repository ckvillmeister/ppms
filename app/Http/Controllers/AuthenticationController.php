<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\User;

class AuthenticationController extends Controller
{
    function index(){
        $settings = Settings::all();
        return view('authentication\login', array('settings' => $settings));
    }

    function authenticate(Request $request){
        $user = $request->input('username');
        $pass = md5($request->input('password'));

        if (User::where('username', '=', $user)->exists()) {
            if (User::where('username', '=', $user)->where('password', '=', $pass)->exists()) {
                return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Login Successful!');
            }
            else{
                return array('result' => 'Error',
                        'color' => 'red',
                        'message' => 'Incorrect password!');
            }
        }
        else{
            return array('result' => 'Error',
                        'color' => 'red',
                        'message' => 'Username does not exist!');
        }
        
    }
}
