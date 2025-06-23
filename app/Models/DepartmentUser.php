<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentUser extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['department_user_name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
