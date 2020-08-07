<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\user as Authenticatable;
class customer extends Authenticatable
{
    protected $table = 'customers';

    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'user_id');
    }
}