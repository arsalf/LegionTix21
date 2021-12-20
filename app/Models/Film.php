<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    public $table = 'FILM';
    public $timestamps = false;

    protected $fillable = [
        "ID",
        "IMDB_ID",
        "TITLE",
        "IMAGE",
        "PLOT",
        "DURATION",
        "GENRE",
        "RATING",
        "DIRECTOR",
        "ACTORS",
        "TRAILER",
        "RELEASE_DATE",
        "LANGUAGE",
        "COUNTRY",
    ];
}
