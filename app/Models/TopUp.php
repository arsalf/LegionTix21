<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    use HasFactory;
    public $table = 'TOPUP';
    public $timestamps = false;

    protected $fillable = [
        "DOMPET_ID",
        "NOMINAL",
        "STATUS",
    ];
    
    protected $hidden = [
        "ID",
        "KODE_PEMBAYARAN",
        "CREATED_AT",
        "CONFIRMED_AT",
    ];
}
