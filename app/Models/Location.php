<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
  
    public $table = 'LOCATION';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'NAME',
        'RT',
        'RW',
        'KELURAHAN',
        'KECAMATAN',
        'KODE_POS',
        'ACCOUNT_ID',
        'LOCATION_ID',
    ];
}
