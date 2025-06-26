<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'department_id',
        'department_users_id',
        'tanggal_pembelian',
        'specifications',
        'operating_system',
        'ket_pc',
        'monitor',
        'ket_monitor',
        'keyboard',
        'ket_keyboard',
        'mouse',
        'ket_mouse',
        'keterangan',
    ];

    // Relasi ke tabel departments
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relasi ke tabel department_users
    public function departmentUser()
    {
        return $this->belongsTo(DepartmentUser::class, 'department_users_id');
    }
}
