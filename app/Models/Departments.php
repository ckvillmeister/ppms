<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "departments";
    protected $fillable = [
        'office_name',
        'description',
        'office_head',
        'sub_offfice',
        'sub_office_in_charge',
        'position',
        'createdby',
        'datecreated',
        'updatedby',
        'dateupdated',
        'status'
    ];
}
