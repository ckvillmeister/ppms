<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ObjectExpenditure;
use App\Models\ObjectAIPCode;

class DepartmentBudget extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "department_budget_per_object";

    public function object(){
        return $this->hasOne(ObjectExpenditure::class, 'id', 'object');
    }

    public function aipcode(){
        return $this->hasMany(ObjectAIPCode::class, 'object', 'object');
    }
}
