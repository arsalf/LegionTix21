<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    public $table = 'ARTIKEL';

    protected $fillable = [
        "ID",
        "JUDUL",
        "ISI",
        "GAMBAR",        
        "KOIN_PLUS"
    ];

    protected $hidden=[
        "AUTHOR",
        "VIEW",
        "CREATED_AT",
        "UPDATED_AT"
    ];
}
