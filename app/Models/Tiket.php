<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    public $table = 'TIKET';
    public $timestamps = false;
    
    protected $fillable = [
        "ID",
        "ACCOUNT_ID",
        "STATUS",
        "SHOWTIME_ID",
        "KURSI_BARIS",
        "KURSI_KOLOM",
        "KURSI_ID",
    ];
}
