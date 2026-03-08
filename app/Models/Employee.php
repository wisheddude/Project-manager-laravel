<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'position',
        'department_id',
    ];


    public function departments() {
        return $this->belongsTo(Department::class);
    }
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
