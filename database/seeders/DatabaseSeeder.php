<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $categories = [
            ['name' => 'مردانه','slug'=>'men', 'order'=> 1],
            ['name' => 'زنانه' ,'slug'=>'women', 'order'=> 1],
            ['name' => 'کودکان','slug'=>'kids', 'order'=> 1],

            ['name' => 'لباس','slug'=>'clothe', 'order'=> 2],
            ['name' => 'کفش','slug'=>'shoes', 'order'=> 2],
            ['name' => 'کیف','slug'=>'bag', 'order'=> 2],

            ['name' => 'اسپورت','slug'=>'sport', 'order'=> 3],
            ['name' => 'راحت','slug'=> 'conf', 'order'=> 3],
            ['name' => 'مجلسی','slug'=>'formal', 'order'=> 3],
        ];

         foreach ($categories as $category){
             \App\Models\Category::create([
                 'name' => $category['name'],
                 'slug' => $category['slug'],
                 'order' => $category['order'],
             ]);
         }

        for ($i = 0; $i < count($categories); $i++){
            for ($j = $i + 1; $j < count($categories); $j++) {
                if ($categories[$i]['order'] == $categories[$j]['order'])
                    continue;
                for ($k = $j + 1; $k < count($categories); $k++) {
                    if ($categories[$j]['order'] == $categories[$k]['order'])
                        continue;
                    $ss = \App\Models\Slug::create([
                        'slug' => $categories[$i]['slug'] . "-" . $categories[$j]['slug'] . "-" . $categories[$k]['slug'],
                    ]);
                    $ss->categories()->attach([$i+1, $j+1, $k+1]);

                }
                $ss = \App\Models\Slug::create([
                    'slug' => $categories[$i]['slug'] . "-". $categories[$j]['slug'],
                ]);
                $ss->categories()->attach([$i+1, $j+1]);
            }
            $ss = \App\Models\Slug::create([
                'slug' => $categories[$i]['slug'],
            ]);
            $ss->categories()->attach([$i+1]);
        }


        $gallery = [
            [ '/IMAGE/product/bag1-1-700x893.jpg', '/IMAGE/product/bag1-2-700x893.jpg', ],
            [ '/IMAGE/product/bag3-1-700x893.jpg', '/IMAGE/product/bag3-2-700x893.jpg', ],
            [ '/IMAGE/product/bag4-1-700x893.jpg', '/IMAGE/product/bag4-2-700x893.jpg', ],
            [ '/IMAGE/product/dress1-1-700x893.jpg', '/IMAGE/product/dress1-2-700x893.jpg', ],
            [ '/IMAGE/product/dress2-1-700x893.jpg', '/IMAGE/product/dress2-2-700x893.jpg', ],
            [ '/IMAGE/product/hoodie1-1-700x893.jpg', '/IMAGE/product/hoodie1-2-700x893.jpg', ],
            [ '/IMAGE/product/hoodie2-1-700x893.jpg', '/IMAGE/product/hoodie2-2-700x893.jpg', ],
            [ '/IMAGE/product/jacket1-1-700x893.jpg', '/IMAGE/product/jacket1-2-700x893.jpg', ],
            [ '/IMAGE/product/jacket2-1-700x893.jpg', '/IMAGE/product/jacket2-2-700x893.jpg', ],
            [ '/IMAGE/product/jeans1-1-700x893.jpg', '/IMAGE/product/jeans1-2-700x893.jpg', ],
            [ '/IMAGE/product/jeans2-1-700x893.jpg', '/IMAGE/product/jeans2-2-700x893.jpg', ],
            [ '/IMAGE/product/shirt1-1-700x893.jpg', '/IMAGE/product/shirt1-2-700x893.jpg', ],
            [ '/IMAGE/product/shirt2-1-700x893.jpg', '/IMAGE/product/shirt2-2-700x893.jpg', ],
            [ '/IMAGE/product/skirt1-1-700x893.jpg', '/IMAGE/product/skirt1-2-700x893.jpg', ],
            [ '/IMAGE/product/skirt4-1-700x893.jpg', '/IMAGE/product/skirt4-2-700x893.jpg', ],
            [ '/IMAGE/product/top1-1-700x893.jpg', '/IMAGE/product/top1-2-700x893.jpg', ],
            [ '/IMAGE/product/top2-1-700x893.jpg', '/IMAGE/product/top2-2-700x893.jpg', ],
        ];



           foreach ($gallery as $images){
               $product = \App\Models\Product::factory()->create();
               foreach ($images as $img){
                   $product->gallery()->create([
                      'image' => $img
                   ]);
               }
               $count = rand(1,3);
               if ($count == 1){
                   $product->categories()->attach([1,7]);
               }
               elseif ($count == 2){
                   $product->categories()->attach([2,7 , 8]);
               }
               elseif ($count == 3){
                   $product->categories()->attach([3, 7, 8 ,9]);
               }
           }

    }
}
