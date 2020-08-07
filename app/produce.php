<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductComment;
use App\user;

class produce extends Model
{
     protected $table = 'produces';

     // Keyword: Laravel relationship
     public function comments()
     {
          return $this->hasMany(ProductComment::class, 'product_id');//quan hệ 1 nhiều

          // hasMany(RelationModal::class, 'foreign_key', 'id')
     }
}
