<?php

namespace App\Observers;

use App\ProductComment;
use Illuminate\Support\Facades\Auth;

class ProductCommentObserver
{
    // Chạy trước khi create
    public function creating(ProductComment $model)
    {
        $model->user_id = Auth::guard('customer')->id();
        return $model;
    }

    // // Chay sau khi create
    // public function created()
    // {

    // }

    // // Chay truoc khi update
    // public function updating()
    // {
        
    // }

    // // Chay sau khi update
    // public function updated()
    // {

    // }

    // // Chay truoc khi delete
    // public function deleting()
    // {

    // }

    // // Chay sau khi delete
    // public function deleted()
    // {

    // }
}
