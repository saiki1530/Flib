<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Project extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_project');
    }
    use HasFactory ,Sluggable;
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
        'download',
        'technical',
        'product_slug',
        'visibility',
    ];
    protected $attributes= ['introduction'=>'', 'img_project'=>'', 'id_field'=>1,
                            'avt'=>'', 'video'=>'', 'status'=>1, 'visibility'=>1,
                            'assess'=>0,'like'=>0, 'download'=>0, 'technical'=>''];
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
