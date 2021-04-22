<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listCourse = $this->listCourse();
        $listType = $this->listType();
        $listCustomer = $this->listCustomer();
        $listPrice = $this->listPrice();
        $discount = $this->listDiscount();
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 20; $i++) {
            DB::table('course')->insert([
                'name' => $listCourse[array_rand($listCourse)],
                'center_id' => rand(1, 50),
                'price' => $listPrice[array_rand($listPrice)],
                'discount' => $discount[array_rand($discount)],
                'type' => $listType[array_rand($listType)],
                'number_of_session' => rand(10, 20),
                'try_study' => rand(0, 1),
                'study_time' => $faker->dateTime,
                'type_customer' => $listCustomer[array_rand($listCustomer)],
                'description' => $faker->text,
                'input_requirement' => $faker->text,
                'out_requirement' => $faker->text,
                'input_point' => rand(0,450),
                'out_point' => rand(450,800),
                'status' => 1,
                'created_at' => $faker->dateTime,
            ]);
        }
    }
    public function listPrice(){
        return [
            '5000000','6000000','8000000','10000000','12000000','9000000'
        ];
    }
    public function listDiscount(){
        return [
            '4000000','2000000','100000','3000000'
        ];
    }
    public function listCourse()
    {
        return [
            "Tiếng Anh giao tiếp - Speak Out", "Speak Now", "Anh văn giao tiếp - Giai đoạn 1", "Giao tiếp căn bản", "Anh văn giao tiếp cơ bản", "English Communication", "Nền tảng A", "Giao tiếp quốc tế", "Tiếng Anh Giao Tiếp", "Tiếng Anh giao tiếp", "Basic - BS (Cho người mất gốc muốn sử dụng tiếng Anh giao tiếp cơ bản)", "Starter", "Tiếng Anh giao tiếp", "Anh văn nghe nói", "Giao tiếp 1", "Giao tiếp", "Tiếng Anh giao tiếp (OC)", "Tiếng Anh thiếu niên 50% người bản xứ", "Giao tiếp (Beginer, Sơ cấp A, Sơ cấp B)", "Anh văn Giao tiếp quốc tế", "Tiếng Anh giao tiếp", "Anh Văn Giao Tiếp", "Tiếng anh giao tiếp thông dụng", "(Ngoại trú) Giao tiếp - Beginner", "Level 1: Foundation - GVVN", "Giao tiếp (Dành cho HS-SV)", "Tiếng Anh giao tiếp - Beginner", "Tiếng Anh giao tiếp tổng quát", "RTC - Giao tiếp cơ bản", "FOUNDATION", "FRESHMAN (Pronounciation)", "Talk Plus", "Tiếng Anh Giao Tiếp", "Căn bản - Phát âm", "Standard Communication", "Tiếng Anh Giao Tiếp Quốc Tế", "Giao tiếp phỏng vấn", "VEnglish - Tiếng Anh giao tiếp", "Anh văn giao tiếp", "Giao tiếp tiếng Anh cơ bản", "Language Alive", "Tiếng Anh Giao tiếp", "tiếng Anh giao tiếp", "PE", "Speaking English", "Tiếng Anh giao tiếp", "1:1 với giáo viên bản ngữ", "Anh văn Giao Tiếp", "Tiếng Anh Giao tiếp", "Tiếng Anh giao tiếp sáng tạo (16+)", "Speaking Grammar 1", "Giao tiếp cơ bản (E-BASE)", "Phát âm chuẩn", "ANH VĂN GIAO TIẾP LEVEL 1", "Tiếng Anh thương mại", "Tiếng Anh giao tiếp", "Nói - Nghe Advanced 2", "Tiếng Anh giao tiếp", "Tiếng Anh giao tiếp", "Anh văn luyện nghe - nói", "Tiếng Anh căn bản", "Anh văn giao tiếp 100% giáo viên nước ngoài", "Tiếng Anh giao tiếp", "Gói học trải nghiệm giao tiếp", "General English", "Anh văn giao tiếp", "Starter", "Tiếng Anh giao tiếp", "Tiếng Anh giao tiếp", "Chương trình luyện nói tiếng Anh như người bản ngữ", "Căn bản", "Giao tiếp Quốc tế", "Luyện nói tiếng Anh như người bản ngữ", "Phát âm chuẩn", "Giao tiếp 1:1", "Tiếng Anh giao tiếp", "Giao tiếp & từ vựng ứng dụng căn bản", "Anh văn giao tiếp", "Anh văn Giao tiếp từ cơ bản đến văn phòng", "Anh văn giao tiếp", "Nghe – nói căn bản", "Anh Văn Giao Tiếp Cơ Bản Cho Người Yếu, Mất Gốc", "Tiếng Anh giao tiếp", "Giao tiếp cơ bản", "Tiếng Anh giao tiếp", "LUYỆN NGHE - NÓI 1, 2, 3, 4", "Anh văn giao tiếp Elementary", "Anh văn giao tiếp", "London Adults", "Anh văn giao tiếp cơ bản", "Giao tiếp cơ bản", "Tiếng Anh giao tiếp Conversation Basic", "Giao tiếp thực hành Beginners", "Giao tiếp căn bản", "Giao tiếp tiếng Anh luyện giọng Mỹ", "Tiếng Anh giao tiếp cơ bản", "Anh văn giao tiếp tổng quát", "Tiếng Anh giao tiếp", "Basic Communication", "Tiếng Anh giao tiếp", "Tiếng Anh giao tiếp", "Starters (Vỡ lòng)", "Nghe nói giao tiếp", "Basic", "Anh văn giao tiếp ứng dụng dành riêng cho người lớn ITALK", "Giao tiếp công việc", "Tiếng Anh giao tiếp", "Luyện phát âm chuẩn giọng Mỹ", "Anh văn giao tiếp", "English Rescue", "Giao tiếp lấy lại căn bản", "Giao tiếp cơ bản Foundation", "Giao tiếp căn bản (Basic English Communication)", "Tiếng Anh giao tiếp căn bản", "Giao tiếp Tiếng Anh", "Tiếng Anh giao tiếp", "Anh văn giao tiếp", "Tiếng Anh giao tiếp", "Tiếng Anh offline - Giao tiếp toàn diện", "Anh văn giao tiếp tổng quát", "Anh văn Giao tiếp Sơ cấp", "Nghe nói giao tiếp", "Free talk", "Pre-Speaking", "Giao tiếp - Thuyết trình", "Phát Âm Và Giao Tiếp Căn Bản", "Tiếng Anh giao tiếp cho người đi làm", "Anh văn Giao Tiếp Tổng quát (4 Kỹ năng)", "Interactive English", "Anh văn giao tiếp", "Tiếng Anh thực hành Nghe - Nói", "tiếng Anh giao tiếp"
        ];
    }

    public function listType()
    {
        return [
            'Giao tiếp cơ bản',
            'Giao tiếp nâng cao',
            'Giao tiếp trung cấp',
            'Giành cho trẻ em',
            'Business English'
        ];
    }

    public function listCustomer()
    {
        return [
            'Trẻ em',
            'Học sinh',
            'Người đi làm',
            'Mọi lứa tuổi'
        ];
    }
}
