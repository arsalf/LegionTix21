<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    public $table = 'VILLAGE';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'NAME',
        'DISTRICT_ID'
    ];
}
