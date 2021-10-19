<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public $table = 'EMPLOYEES';
    
    protected $fillable = [
        'EMPLOYEE_ID',
        'FIRST_NAME',
        'LAST_NAME',
        'EMAIL',
        'PHONE_NUMBER',
        'HIRE_DATE',
        'JOB_ID',
        'SALARY',
        'COMMISSION_PCT',
        'MANAGER_ID',
        'DEPARTMENT_ID'
    ];
}
