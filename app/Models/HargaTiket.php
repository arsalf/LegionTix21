<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaTiket extends Model
{
    use HasFactory;
    public $table = 'HARGATIKET';
    public $timestamps = false;    
    protected $primaryKey = [
        'DAY_NAME',
        'STUDIO_ID',
    ];
    public $incrementing = false;

    protected $fillable = [
        'DAY_NAME',
        'STUDIO_ID',
        'HARGA'
    ];
}
