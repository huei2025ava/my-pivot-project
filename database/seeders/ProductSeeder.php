<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
      $products = [
       ['name' => '奧拉夫達摩藍色零錢包', 'price' => 290, 'img' => 'oblue.webp' ,'stock' => 10],
       ['name' => 'SNOOPY 冰淇淋造型吊飾', 'price' => 390, 'img' => 'sice.webp','stock' => 10],
       ['name' => 'OLAF 冰淇淋造型吊飾', 'price' => 390, 'img' => 'oice.webp','stock' => 10],
       ['name' => '史努比卡其色斜背小包', 'price' => 550, 'img' => 'syebag.webp','stock' => 10],
       ['name' => '史努比黑色斜背小包', 'price' => 550, 'img' => 'ssbag.webp','stock' => 10],
       ['name' => '奧拉夫軍綠色斜背小包', 'price' => 550, 'img' => 'sgrebag.webp','stock' => 10],
       ['name' => '史努比大頭造型抱枕', 'price' => 980, 'img' => 'snake.webp','stock' => 10],
       ['name' => '史努比粉色手提麻布袋', 'price' => 420, 'img' => 'sbag.webp','stock' => 10],
       ['name' => 'SNOOPY 經典手提麻布袋', 'price' => 420, 'img' => 'sbigbag.webp','stock' => 10],
       ['name' => 'OLAF 經典手提麻布袋', 'price' => 420, 'img' => 'obag.webp','stock' => 10],
       ['name' => '史努比與奧拉夫條紋提袋', 'price' => 720, 'img' => 'allbag.webp','stock' => 10],
       ['name' => '史努比黃色保溫杯', 'price' => 850, 'img' => 'yecup.webp','stock' => 10],
       ['name' => '奧拉夫米色保溫杯', 'price' => 850, 'img' => 'ocup.webp','stock' => 10],
       ['name' => '史努比彩色條紋大提袋', 'price' => 680, 'img' => 'scolorbag.webp','stock' => 10],
       ['name' => '奧拉夫彩色條紋大提袋', 'price' => 680, 'img' => 'ocolorbag.webp','stock' => 10],
      ];
       foreach($products as $product) {
           Product::create($product);
       }
    }
}