<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Product extends Model
{
    //
    protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function saveTags($tags)
    {
        $tagnames = explode(',', $tags);

        $arrayTags = Array();

        foreach ($tagnames as $tagname) {
            if (($tagname == '') or ($tagname == ' '))
                continue;

            try {
                $OldTag = Tag::where('name', '=', $tagname)->firstOrFail();
                $arrayTags[] = $OldTag->id;
            } catch (ModelNotFoundException $e) {
                $newTag = Tag::Create(['name' => $tagname]);
                $newTag->save();
                $arrayTags[] = $newTag->id;
            }

            $this->tags()->sync($arrayTags);
        }
   }

   public function listTags()
   {
       $tags = $this->tags->lists('name')->toArray();
       return implode(',',$tags);
   }
}