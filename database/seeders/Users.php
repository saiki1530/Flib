<?php

namespace Database\Seeders;

use App\Models\User as ModelUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Events\ModelsPruned;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name'=>'Trần Văn Anh',
                'email'=>'anhtt@gmail.con',
                'password'=>'11111111',
            ],
            [
                'name'=>'Hồng Anh',
                'email'=>'anhong@gmail.com',
                'password'=>'11111111',
            ],
            [
                'name'=>'Lê Long',
                'email'=>'lelong@gmail.com',
                'password'=>'11111111',
            ],
        ];
        ModelUsers::insert($data);
    }
}
