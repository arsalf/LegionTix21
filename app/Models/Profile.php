<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $table = 'PROFILE';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'USERNAME',
        'EMAIL',
        'NO_HP',
        'PASSWORD',
        'ROLE_ID',
        'MANAGER_ID',
    ];
}
