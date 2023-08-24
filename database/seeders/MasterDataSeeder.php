<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_stores')->insert([
            'store_name' => "McDonald's",
        ]);
        DB::table('master_stores')->insert([
            'store_name' => "Starbucks",
        ]);

        $macFilePath = storage_path('app/Mac_menu.csv'); // CSVファイルのパスを指定

        $macData = array_map('str_getcsv', file($macFilePath)); // CSVファイルを読み込み

        $macHeader = array_shift($macData); // ヘッダー行を取り出す

        foreach ($macData as $row) {
            $product = array_combine($macHeader, $row); // ヘッダーと行を結合
            
            DB::table('master_dishes')->insert([
                'store_id' => 1, // マクドナルドの店舗ID
                'dish_name' => $product['dish_name'],
                'calory' => $product['calory'],
            ]);
        }

        // ここからスタバ
        $starbucksFilePath = storage_path('app/Starbucks_menu.csv'); // CSVファイルのパスを指定

        $starbucksData = array_map('str_getcsv', file($starbucksFilePath)); // CSVファイルを読み込み

        $starbucksHeader = array_shift($starbucksData); // ヘッダー行を取り出す

        foreach ($starbucksData as $row) {
            $product = array_combine($starbucksHeader, $row); // ヘッダーと行を結合

            DB::table('master_dishes')->insert([
                'store_id' => 2, // スタバの店舗ID
                'dish_name' => $product['dish_name'],
                'calory' => $product['calory'],
            ]);
        }
    }
}
