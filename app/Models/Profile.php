<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $table = 'PROFILE';
    public $timestamps = false;
    protected $primaryKey = 'ACCOUNT_ID';

    protected $fillable = [
        'ACCOUNT_ID',
        'FIRST_NAME',
        'LAST_NAME',
        'NO_HP',
        'BIRTH_DATE',
        'ADDRESS',
        'KELURAHAN_ID'
    ];
}
