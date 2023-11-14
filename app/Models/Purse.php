<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purse extends Model
{
    use HasFactory;
    protected $table = 'purse';
    protected $fillable = [
        'id_users',
        'flib',
        'points',
    ];
}
