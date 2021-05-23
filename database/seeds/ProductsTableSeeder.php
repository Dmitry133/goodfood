<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i < 11; $i++)
        \Illuminate\Support\Facades\DB::table('products')->insert([
           'name'=> 'Product '.$i,
            'price'=> rand(200.00,1500.00),
            'in_stock'=> 1,
            'barcode'=> rand(1000,10000),
            'description'=> 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн',
            'kCal' => rand(100,1000),
            'protein' => rand(100,1000),
            'fats' => rand(100,1000),
            'carbohydrates' => rand(100,1000)
        ]);
    }
}
