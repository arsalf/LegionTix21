<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;
    public $table = 'BIOSKOP';

    protected $fillable = [        
        'ACCOUNT_ID',
        'NO_REK',
        'NAME',
        'TYPE',
        'ADDRESS',
        'VILLAGE_ID',        
    ];

    protected $hidden = [
        'ID',
        'SALDO',        
        'CREATED_AT',
        'UPDATED_AT',
        'ISACTIVE'
    ];
}
