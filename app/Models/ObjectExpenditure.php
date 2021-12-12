<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassExpenditure;

class ObjectExpenditure extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "object_expenditures";
    protected $fillable = [
        'obj_exp_name',
        'class_exp_id',
        'createdby',
        'datecreated',
        'updatedby',
        'dateupdated',
        'status'
    ];

    public function class_of_expenditure(){
        return $this->belongsTo(ClassExpenditure::class, 'class_exp_id', 'id');
    }

}
