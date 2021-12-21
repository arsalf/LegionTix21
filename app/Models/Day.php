<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    public $table = 'DAY';
    public $timestamps = false;
    protected $primaryKey = 'NAME';
    public $incrementing = false;

    protected $fillable = [
        'NAME'
    ];
}
