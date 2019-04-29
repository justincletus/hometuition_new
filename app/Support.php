<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Support extends Model
{
    protected $fillable = ['name','details', 'cat_id'];

    use Sluggable;

      /**
       * Return the sluggable configuration array for this model.
       *
       * @return array
       */
      public function sluggable()
      {
          return [
              'slug' => [
                  'source' => 'name'
              ]
          ];
      }
}
