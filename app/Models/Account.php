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
        'USERNAME',
        'EMAIL',
        'PASSWORD',        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'ID',
        'ROLE_NAME',
        'ACCOUNT_ID',
        'isActive',        
        'password',        
        'remember_token',        
    ];
}
