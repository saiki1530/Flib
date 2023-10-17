<?php

namespace Database\Seeders;

use App\Models\Field as ModelsField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Field extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Lập trình web',
                'amount' => 1,
            ],
            [
                'name' => 'Ứng dụng phần mềm',
                'amount' =>1
            ],
            [
                'name' => 'Thiết kế đồ họa',
                'amount' => 1
            ],
        ];
        ModelsField::insert($data);

    }
}
