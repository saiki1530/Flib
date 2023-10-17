<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function replys()
    {
        return $this->hasMany(Reply::class, 'id_cmt');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
    use HasFactory;
    protected $table = 'cmt';
    protected $fillable = [
        'id',
        'id_users',
        'name',
        'id_project',
        'text_cmt',
        'like'
    ];
}
