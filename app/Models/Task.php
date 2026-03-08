<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'description',
        'project_id',
        'employee_id',
        'end_date',
        'status',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
