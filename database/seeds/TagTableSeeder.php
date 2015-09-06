<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class TagTableSeeder extends Seeder
{
    public function run()
    {
       // DB::table('tags')->truncate();
        factory(CodeCommerce\Tag::class,30)->create();

        $numberofProducts = mt_rand(2,15);

        foreach(range(1,$numberofProducts) as $j)
        {
           $product = Product::find(mt_rand(1, 40));

           $tagArray = Array();

           $numberofTags = mt_rand(2,8);

           foreach (range(1,$numberofTags) as $i)
               $tagArray[] = Tag::find(mt_rand(1,30))->id;

           $product->tags()->sync($tagArray);

           unset($tagArray);
        }

    }
}
