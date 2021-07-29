<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsModel;

class AuthenticationController extends Controller
{
    function index(){
        $settings_model = new SettingsModel();
        $settings = $settings_model->get_settings(1);
        return view('authentication\login', array('settings', $settings));
    }
}
