<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $table = 'CITY';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'NAME',
        'PROVINCE_ID',
    ];
}
