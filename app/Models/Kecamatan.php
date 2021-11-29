<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $table = 'KECAMATAN';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'NAME',
        'CITY_ID'
    ];
}
