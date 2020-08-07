<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\category;
use App\produce;
use App\img;
use App\vendor;
use App\Cart;
use App\customer;
use App\bill;
use App\bill_detail;
use Session;

class PagesController extends Controller
{
    public function index(){

        $listProduces = DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->get();
        
        // san pham noi bac
        $prouctTop=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('top','>=','11')
        ->get();
        // san pham uu dai
        $Hot_KM=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->whereColumn('price', '>','discout_price')->get();
      
        // San pham mua nhieu nhat
        $MostProduct=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('top','>=','50')->get();

        // phone
        $phoneProduct=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.category_id','=','1')->get();
        // laptop
        $laptopProduct=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.category_id','=','2')->get();
        // o'clock
        $oClockProduct=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.category_id','=','3')->get();

        // phu kien
        $accesProduct=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.category_id','=','4')->get();
        
        return view('client.pages.index', compact('listProduces','prouctTop','Hot_KM', 'phoneProduct','laptopProduct','oClockProduct', 'accesProduct', 'MostProduct'));       
    }
    

    /*GIO HANG*/
    public function ShowCart(){
        return view('client.pages.cart');
    }
    // add cart
    public function AddCart(Request $request){
        $product=DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->where('produces.id', $request->id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null; 
            $newCart = new Cart($oldCart);
            $newCart->AddCarts( $product, $request->id);
            Session()->put('Cart', $newCart);
        }
        return redirect()->back();
    }

    // update cart
    public function UpdateCart(Request $request){
        $id=$request->id;
        
    }

    // delete cart
    public function DeleteCart(Request $request){
        $product=DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->where('produces.id', $request->id)->first();

        $id=$request->id;
        $oldCart=Session::has('Cart') ? Session::get('Cart') : null;
        $cart = new Cart($oldCart);
        $cart -> DeleteItemCart($id);
        if(count($cart -> $product) > 0){
            $request-> Session()->put('Cart', $newCart);
        }
        else{
            $request-> Session()->forget('Cart');
        }
        return redirect()->back();

    }

  
    

    // Tìm kiếm
    public function getSearch(Request $req) {
        $listProduces = DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.name', 'like','%'.$req->key_word.'%')->get();
        return view('client.pages.list-product', compact('listProduces'));
    }

    // kết quả tìm kiếm
    public function getSearchResult(Request $req){
        $result = DB::table('produces')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->join('categories', 'produces.category_id', '=', 'categories.id')
        ->where('style','=', '1')
        ->orderBy('produces.id');
        $listSearchResult=$result->where('produces.name', 'like','%'.$req->key.'%')->orWhere('produces.price', $req->key)
        ->paginate(12);
        return view('client.pages.searchResult', compact('listSearchResult'));
    }

    //Lien he
    public function contact(){
        return view('client.pages.contact');
    }

    // gioi gioi thieu
    public function about(){
        return view('client.pages.about');
    }
    



}