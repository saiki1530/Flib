<?php

namespace Database\Seeders;

use App\Models\Review as ModelsReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Review extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_users' => 2,
                'id_project' => 3,
                'introduction' => 'Một dự án thật tuyện vời',
                'content' => 'Chiều 17-10, theo giờ địa phương, tại Bắc Kinh (Trung Quốc), Chủ tịch nước Võ Văn Thưởng đã có cuộc gặp với Tổng thống Nga Vladimir Putin, nhân dịp cả hai nhà lãnh đạo cùng dự Diễn đàn Sáng kiến Vành đai và Con đường lần ba.',
                'avt' => 'avt.png',
                'status' => 1,
                'visibility' => 1,
            ],
            [
                'id_users' => 1,
                'id_project' => 1,
                'introduction' => 'Dự án rất hay',
                'content' => 'Chiều 17-10, theo giờ địa phương, tại Bắc Kinh (Trung Quốc), Chủ tịch nước Võ Văn Thưởng đã có cuộc gặp với Tổng thống Nga Vladimir Putin, nhân dịp cả hai nhà lãnh đạo cùng dự Diễn đàn Sáng kiến Vành đai và Con đường lần ba.',
                'avt' => 'avt.png',
                'status' => 1,
                'visibility' => 1,
            ],
            [
                'id_users' => 3,
                'id_project' => 2,
                'introduction' => 'Review về dự án tuyệt vời',
                'content' => 'Chiều 17-10, theo giờ địa phương, tại Bắc Kinh (Trung Quốc), Chủ tịch nước Võ Văn Thưởng đã có cuộc gặp với Tổng thống Nga Vladimir Putin, nhân dịp cả hai nhà lãnh đạo cùng dự Diễn đàn Sáng kiến Vành đai và Con đường lần ba.',
                'avt' => 'avt.png',
                'status' => 1,
                'visibility' => 1,
            ],
        ];
        ModelsReview::insert($data);
    }
}
