<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $cast = [
        'time'
    ];
    protected $table = "settings";
    protected $primary = 'id';
    protected $fillable = [
        'name',
        'address'
    ];

    public static function getSetting($code){
        return Settings::where('setting_name', $code)->first();
    }
}
