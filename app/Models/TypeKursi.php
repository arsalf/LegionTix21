<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeKursi extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = 'TYPEKURSI';
    public $timestamps = false;
    protected $primaryKey = 'NAME';
    public $incrementing = false;

    protected $fillable = [
        'NAME',        
        'JUMLAH'
    ];
}
