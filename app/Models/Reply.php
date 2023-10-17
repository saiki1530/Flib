<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function comment()
        {
            return $this->belongsTo(Comment::class, 'id_cmt');
        }
    use HasFactory;
    protected $table = 'reply_cmt';
    protected $fillable = [
        'id',
        'id_users',
        'name',
        'id_cmt',
        'text_cmt',
        'like'
    ];
}
