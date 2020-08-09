<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\wishlist;
class WishlistController extends Controller
{
    public function addWishlist(Request $request)
    {
        $id=$request->id;
        $wishlist = new wishlist;

        $wishlist->cus_id = Auth::guard('customer')->id();
        $wishlist->produce_id= $id;
        $wishlist->status = 1;
        $wishlist->save();
        return redirect()->back();
    }

}