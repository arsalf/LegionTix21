<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $table = 'ROLE';
    public $timestamps = false;
    protected $primaryKey = 'ID';
    public $incrementing = true;

    protected $fillable = [
        'ID',
        'NAME',
    ];
}
