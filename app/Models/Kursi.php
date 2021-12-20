<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;
    public $table = 'KURSI';
    public $incrementing = false;
    public $timestamps = false;

    // protected $primaryKey = [
    //     'ROWPOS_RNAME',
    //     'COLPOS_SEAT',
    //     'STUDIO_ID',
    // ];
    
    protected $fillable = [
        'BARIS',
        'KOLOM',
        'TYPEKURSI_NAME',
        'STUDIO_ID',
        'SHOW'
    ];
}
