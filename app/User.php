<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\user as Authenticatable;
class user extends Authenticatable
{
    // use softDeletes;
    protected $table = 'users';

    // public function getPasswordAttribute(){
    //     return $this->$password;
    // }

}
