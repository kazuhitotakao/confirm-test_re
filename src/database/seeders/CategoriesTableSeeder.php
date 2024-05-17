<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '商品のお届けについて',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('categories')->insert($param);
        $param = [
            'content' => '商品の交換について',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('categories')->insert($param);
        $param = [
            'content' => '商品トラブル',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('categories')->insert($param);
        $param = [
            'content' => 'ショップへのお問い合わせ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('categories')->insert($param);
        $param = [
            'content' => 'その他',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('categories')->insert($param);

    }
}
