<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    use HasFactory;
    protected $table = 'favourite';
    protected $fillable = [
        'id',
        'id_users',
        'id_project',
    ];
}
