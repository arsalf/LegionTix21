<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    public $table = 'ACCOUNT';
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
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
