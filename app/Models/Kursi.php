<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;
    public $table = 'KURSI';

    protected $fillable = [
        "ROWPOS_RNAME",
        "COLPOS_SEAT",
        "TYPEKURSI_NAME",
        "STUDIO_ID",
        "SHOW"
    ];
}
