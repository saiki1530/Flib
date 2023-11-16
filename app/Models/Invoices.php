<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $table ='invoices';
    protected $fillable = [
        'id','id_users','id_project','transaction','status','total',
    ];
}
