<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $table = 'product_comments';

    protected $fillable = [
        'product_id',
        'rate',
        'content'
    ];

    public function customer()
     {
          return $this->belongsTo(customer::class, 'user_id'); // Quan he 1-n
     }

     // hasOne
     // belongsToMany()
     // morphTo()
}
