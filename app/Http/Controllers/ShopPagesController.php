<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\post;
use App\category;
use App\produce;
use App\img;
use App\vendor;
use App\Cart;
use App\customer;
use App\bill;
use App\bill_detail;
use Session;

class ShopPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = post::all();
       
        // echo $listPost;
        return view('shop.pages.index', compact('listPost'));

    }
    public function show(Request $request){
        $id=$request->id;
        $showVendor = vendor::find($id);
        $listProduces = DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where("vendors.id", "=", $id)
        ->get();
        
        // san pham uu dai
        $Hot_KM=DB::table('produces')
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where("vendors.id", "=", $id)
        ->whereColumn('price', '>','discout_price')->get();
      
       
        return view('shop.pages.shop_index', compact('listProduces', 'Hot_KM', "showVendor" ));       

    }
}
