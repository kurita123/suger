<?php

use Illuminate\Database\Seeder;
use App\Models\Inquiry;

class InquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            Inquiry::create([
                'user_id'    => $i,
                'inquiry'    => 'これはテスト投稿' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
