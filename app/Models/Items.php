<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemPrice;
use App\Models\ObjectExpenditure;
use App\Models\ClassExpenditure;

class Items extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "items";
    protected $fillable = ['itemname',
                            'uom',
                            'object_of_expenditure',
                            'category',
                            'createdby',
                            'datecreated',
                            'updatedby',
                            'dateupdated',
                            'status'];

    public function item_price(){
        return $this->hasMany(ItemPrice::class, 'itemid', 'id');
    }

    public function object_of_expenditure(){
        return $this->belongsTo(ObjectExpenditure::class, 'object_of_expenditure', 'id');
    }

}
