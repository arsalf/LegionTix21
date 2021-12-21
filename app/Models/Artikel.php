<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    public $table = 'ARTIKEL';
    public $timestamps = false;

    protected $fillable = [
        "ID",
        "JUDUL",
        "ISI",
        "GAMBAR",
        "AUTHOR",
        "KOIN_PLUS",
        "VIEW",
    ];
}
