<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    protected $fillable = ['pagename','details','uid'];
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
                  'source' => 'pagename'
              ]
          ];
      }

}
