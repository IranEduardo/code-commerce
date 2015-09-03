<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class TagTableSeeder extends Seeder
{
    public function run()
    {
       // DB::table('tags')->truncate();
        factory(CodeCommerce\Tag::class,30)->create();

        $faker = faker::create();

        foreach(range(1,$faker->numberBetween(2, 15)) as $j)
        {
           $product = Product::find($faker->numberBetween(1, 40));

           $tagArray = Array();

           foreach (range(1, $faker->numberBetween(2, 8)) as $i)
               $tagArray[] = Tag::find($faker->numberBetween(1, 30))->id;

           $product->tags()->sync($tagArray);

           unset($tagArray);
        }

    }
}
