<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "item_price";
    protected $fillable = [
        'itemid',
        'price',
        'year',
        'createdby',
        'datecreated',
        'updatedby',
        'dateupdated',
        'status'
    ];
}
