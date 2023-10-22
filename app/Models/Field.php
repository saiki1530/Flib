<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $table = 'field';
    protected $fillable = [
        'name',
        'amount',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class, 'product_id');
    }

}
