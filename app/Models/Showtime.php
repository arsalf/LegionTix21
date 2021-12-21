<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    public $table = 'SHOWTIME';
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = [    
        'WAKTU', 
        'FILM_ID', 
        'STUDIO_ID',         
    ];

    protected $hidden = [
        'ID', 
        'DAYNAME', 
        'ISACTIVE'
    ];
}
