<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $table = 'PROFILE';
    public $timestamps = false;
    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'FIRST_NAME',
        'LAST_NAME',
        'BIRTH_DATE',
        'ACCOUNT_ID',
        'ADDRESS',
        'KELURAHAN_ID'
    ];
}
