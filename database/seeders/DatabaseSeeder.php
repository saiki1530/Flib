<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DB::table('category_details')->insert([
        //     ['name' => 'chinh-tri', 'item' => json_encode(['Lịch sử chính trị','Triết học chính trị','Chính sách công cộng','Hệ thống chính trị','Lãnh đạo và chính trị gia'])],

        // ]);
        $this->call([
            // Other seeders here
            Field::class,
        ]);
        $this->call([
            // Other seeders here
            Project::class,
        ]);
        $this->call([
            // Other seeders here
            Review::class,
        ]);
        $this->call([
            // Other seeders here
            ReviewSeeders::class,
        ]);
        // $this->call([
        //     // Other seeders here
        //     UserSeeders::class,
        // ]);

    }
}
