<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    public $table = 'ViewDompetAccount';
    public $timestamps = false;

    protected $fillable = [      
        'USERNAME',
        'EMAIL',
        'PASSWORD',
        'ROLE_NAME',
        'BALANCE',
        'KOIN',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'ID',        
        'ACCOUNT_ID',
        'isActive',        
        'password',        
        'remember_token',
    ];
}
