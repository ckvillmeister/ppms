<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassExpenditure extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "class_expenditures";
    protected $fillable = [
        'class_exp_name',
        'createdby',
        'datecreated',
        'updatedby',
        'dateupdated',
        'status'
    ];
}
