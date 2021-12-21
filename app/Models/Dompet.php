<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;
    public $table = 'DOMPET';
    public $timestamps = false;

    protected $fillable = [
        "ACCOUNT_ID",
        "BALANCE",
        "KOIN",
    ];
}
