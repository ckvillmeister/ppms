<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['firstname',
                            'middlename',
                            'lastname',
                            'extension',
                            'username',
                            'password',
                            'createdby',
                            'datecreated',
                            'updatedby',
                            'dateupdated',
                            'status'];
}
