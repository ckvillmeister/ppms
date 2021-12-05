<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Settings;

class AuthenticationController extends Controller
{

    function index(){
        $settings = Settings::all();

        if(!(Auth::check()))
        {
            return view('authentication.login', array('settings' => $settings));
        }
        else{
            if ($this::isAuthorized(Auth::user()->role, 'sidebarDashboard')){
                return redirect('dashboard');
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
    }

    function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
                
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $redirect = 'dashboard';

            if (in_array(Auth::user()->role, [1, 2])){
                $redirect = 'dashboard';
            }
            else{
                $redirect = 'myprocurement';
            }

            return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Login Successful!',
                        'redirect' => $redirect);
        }
        else{
            return array('result' => 'Error',
                        'color' => 'red',
                        'message' => 'Incorrect user credentials!');
        }
        
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
