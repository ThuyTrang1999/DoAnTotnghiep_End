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
use App\post;
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

        
        $sql=DB::select('SELECT produce_id, SUM(quanlity)
        FROM bill_details
        GROUP BY produce_id
        ORDER By SUM(quanlity) DESC');

        $produce_bill=DB::table('produces')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->join('bill_details', 'produces.id', '=', 'bill_details.produce_id')
        // ->where(function ($query) {
        //     $query->select('SELECT produce_id, SUM(quanlity)
        //     FROM bill_details
        //     GROUP BY produce_id
        //     ORDER By SUM(quanlity) DESC');
        // })->get();
        ->get();
      
        // dd($produce_bill);
        

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
        // tin tức
        $new_Data = DB::table('posts')
        ->orderByDesc('id')->paginate(2);

        return view('client.pages.index', compact('listProduces','prouctTop','Hot_KM', 'phoneProduct','laptopProduct','oClockProduct', 'accesProduct', 'MostProduct','new_Data'));       
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
        $id=$request->id;
        $oldCart=Session::has('Cart') ? Session::get('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart -> DeleteItemCart($id);
        if(Count($newCart->sanpham) > 0){
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
   public function news(){

    $new_Data=DB::table('posts')->where('posts.status', '=', '1')->get();

    return view('client.pages.news', compact('new_Data'));
}
    // gioi gioi thieu
    public function about(){
        return view('client.pages.about');
    }
    
  // check login

  public function checkAccount(Request $request){
    
        $email = Auth::guard('customer')->user()->email;
        $password =Auth::guard('customer')->user()->password;
        $role =Auth::guard('customer')->user()->role;
        // dd($role);
     
      
            if ($role == 1) {
                $infoShop=DB::table('customers')
                ->join('vendors', 'customers.id', '=', 'vendors.cus_id')
                ->where('email','=',$email)->first();
                return view('shop.pages.index', compact('infoShop'));
            } else {
                return view('client.pages.openStore');
               
            }
        

        
      
     

   
    
}

    public function openStore(Request $request){
    
   
        return view('client.pages.openStore');
       
    }
    public function createStore(Request $request){
    
        $vendor = new vendor;
        $vendor->shop_name = $request->shop_name;
        $vendor->cus_id = Auth::guard('customer')->user()->id;
        $get_images_banner=$request->file('bannerFile');
        $vendor->desc_vendor =  $request->desc;
        $get_images_logo=$request->file('logoFile');
        $vendor->status =$request->status;
        // images banner
        if($get_images_banner && $get_images_logo){
            $new_images_banner=time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." .$request->bannerFile->getClientOriginalName();
            $new_images_logo=time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." .$request->logoFile->getClientOriginalName();
            $get_images_banner->move('upload/banner', $new_images_banner);
            $get_images_logo->move('upload/logo', $new_images_logo);
            $vendor->banner = $new_images_banner;
            $vendor->logo = $new_images_logo;
            $vendor->save();
        }
        $vendor->save();
        return redirect()->route('client.index');
       
    }
  
 





}