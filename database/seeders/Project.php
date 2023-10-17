<?php

namespace Database\Seeders;

use App\Models\Project as ModelsProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Project extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'name' => 'Dự án quản lý nhà hàng',
                'id_field' => 1,
                'img_project' => 'project.img',
                'id_users' => 1,
                'introduction' => 'Trangg web hô trợ quản lý một nhà hàng mạng lại nhiều giá trị',
                'avt' => 'avt.png',
                'video' => 'video.mp3',
                'status' => 1,
                'source' => 'tranvaanh.github',
                'technical' => 'laravel , React , js , firebase',
                'ppt'=>'ppt.png',
                'assess'=>0,
                'like'=>0,
                'product_slug'=>'a',
                'visibility' => 1
            ],
            [
                'name' => 'Sàn thương mại điện tử',
                'id_field' => 2,
                'img_project' => 'project.img',
                'id_users' => 2,
                'introduction' => 'Trangg web hô trợ quản lý một nhà hàng mạng lại nhiều giá trị',
                'avt' => 'avt.png',
                'video' => 'video.mp3',
                'status' => 1,
                'source' => 'tranvaanh.github',
                'technical' => 'laravel , React , js , firebase , html , css, pusher, C#',
                'ppt'=>'ppt.png',
                'assess'=>8,
                'like'=>0,
                'product_slug'=>'a',
                'visibility' => 1
            ],
            [
                'name' => 'Bìa quản cáo Phúc Long',
                'id_field' => 3,
                'img_project' => 'project.img',
                'id_users' => 3,
                'introduction' => 'Trangg web hô trợ quản lý một nhà hàng mạng lại nhiều giá trị',
                'avt' => 'avt.png',
                'video' => 'video.mp3',
                'status' => 1,
                'source' => 'tranvaanh.github',
                'technical' => 'Adobe photoshop',
                'ppt'=>'ppt.png',
                'assess'=>10,
                'like'=>0,
                'product_slug'=>'a',
                'visibility' => 1
            ],
        ];
        ModelsProject::insert($data);
    }
}
