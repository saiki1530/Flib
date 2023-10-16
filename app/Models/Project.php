<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'name',
        'id_field',
        'img_project',
        'id_users',
        'introduction',
        'avt',
        'video',
        'status',
        'source',
        'ppt',
        'assess',
        'like',
        'product_slug',
        'visibility',
    ];
}
