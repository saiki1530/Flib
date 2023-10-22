<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Project extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'project';
    protected $fillable = [
        'name',
        'id_field',
        'id_users',
        'img_project',
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
    protected $attributes= ['introduction'=>'', 'img_project'=>'', 'id_field'=>1,
                            'avt'=>'', 'video'=>'', 'status'=>1, 'visibility'=>1,
                            'assess'=>0,'like'=>0];
    public function Field()
    {
        return $this->belongsTo(Field::class, 'product_id');
    }
    
    
    public function sluggable(): array
    {
        return [
            'product_slug' => [
                'source' => 'name'
            ]
        ];
    }

}
