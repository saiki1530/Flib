<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'id';
    protected $fillable = ['id_users', 'id_project', 'introduction', 'content', 'avt', 'status', 'visibility'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    use HasFactory;
}
