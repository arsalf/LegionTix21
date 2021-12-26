<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    public $table = 'STUDIO';
    public $timestamps = false;

    protected $fillable = [
        'isactive',
        'NAME',
        'type',
        'bioskop_id',
    ];

    protected $hidden = [
        'id',        
    ];
}
