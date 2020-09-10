<?php

use Illuminate\Database\Seeder;
use App\Models\Suger;

class SugersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sugers')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('sugers')->insert([
            'name' => '卵',
            'suger' => 0.1,
            'amount' => '1個',
        ]);

        DB::table('sugers')->insert([
            'name' => 'とり肉',
            'suger' => 0.2,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => '鶏肉',
            'suger' => 0.1,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => '豚肉',
            'suger' => 0.2,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => '牛肉',
            'suger' => 0.4,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => '玄米',
            'suger' => 34,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => '白米',
            'suger' => 36,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'もやし',
            'suger' => 2.6,
            'amount' => '200g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'アボカド',
            'suger' => 1.2,
            'amount' => '1個',
        ]);

        DB::table('sugers')->insert([
            'name' => 'ほうれん草',
            'suger' => 0.1,
            'amount' => '1束',
        ]);

        DB::table('sugers')->insert([
            'name' => 'オクラ',
            'suger' => 0.2,
            'amount' => '1本',
        ]);

        DB::table('sugers')->insert([
            'name' => 'サニーレタス',
            'suger' => 0.2,
            'amount' => '20g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'きゅうり',
            'suger' => 1.9,
            'amount' => '1本',
        ]);

        DB::table('sugers')->insert([
            'name' => 'ブロッコリー',
            'suger' => 0.2,
            'amount' => '30g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'えのきだけ',
            'suger' => 3.7,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'しめじ',
            'suger' => 0.9,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => '椎茸',
            'suger' => 0.2,
            'amount' => '1個',
        ]);

        DB::table('sugers')->insert([
            'name' => 'わかめ',
            'suger' => 0,
            'amount' => '10g',
        ]);

        DB::table('sugers')->insert([
            'name' => '舞茸',
            'suger' => 0.9,
            'amount' => '100g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'もずく',
            'suger' => 0,
            'amount' => '40g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'ブルーベリー',
            'suger' => 2.9,
            'amount' => '30g',
        ]);

        DB::table('sugers')->insert([
            'name' => 'ラズベリー',
            'suger' => 1.7,
            'amount' => '30g',
        ]);

    }
}
