<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionCategory;

class Permissions extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "permissions";

    public function category(){
        return $this->belongsTo(PermissionCategory::class, 'category', 'id');
    }
}
