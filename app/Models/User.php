<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'Users'; 

    protected $guarded = [];

    public function departmentBelongs()
    {
        return $this->belongsTo(Department::class, 'fk_department', 'Id');
    }

    public function designationBelongs()
    {
        return $this->belongsTo(Designation::class, 'fk_designation', 'Id');
    }
}
