<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectExpenditure extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'obj_exp_name',
        'createdby',
        'datecreated',
        'updatedby',
        'dateupdated',
        'status'

    ];
}
