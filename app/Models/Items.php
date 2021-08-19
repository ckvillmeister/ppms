<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['itemname',
                            'price',
                            'uom',
                            'object_of_expenditure',
                            'category',
                            'createdby',
                            'datecreated',
                            'updatedby',
                            'dateupdated',
                            'status'];
}
