<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    public $table = 'TIKET';

    protected $fillable = [
        "ID",
        "ACCOUNT_ID",
        "STATUS",
        "SHOWTIME_ID",
        "KURSI_RNAME",
        "KURSI_COLPOS_SEAT",
        "KURSI_ID",
    ];
}
