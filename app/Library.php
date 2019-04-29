<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Library extends Model
{
    protected $fillable = ['title', 'details','filename'];
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
                  'source' => 'title'
              ]
          ];
      }
}
