<?php

namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\category;
use App\vendor;
use App\img;
use App\user;
use App\produce;
use App\post;
use App\brand;
class ShopProductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $categories = category::all();
        $vendor =  Auth::guard('customer')->user()->id;
        $result = DB::table('imgs')
        ->join('produces', 'produces.id', '=', 'imgs.produce_id')
        ->join('categories', 'produces.category_id', '=', 'categories.id')
        ->join('brand', 'produces.brand', '=', 'brand.id')        
        ->join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        
        ->where('vendors.cus_id','=',$vendor)
        ->where('imgs.style','=',1);
        
        if($request->search){
            $result->where('produces.name', 'like', '%' .$request->search. '%')->get(); 
        }
        if($request->cate){
            $result->where('categories.id',$request->cate)->get();
        }
        if($request->status){
            $result->where('produces.status',$request->status)->get();
        }

        $listProducesCategory = $result->paginate(5);
        //dd($vendor);
         //dd($listProducesCategory);
        


        //  echo $listProducesCategory;
        return view('shop.pages.product_shop.list-product-shop', compact('listProducesCategory','categories'));

    }
    public function create()
    {
        $brand = brand::all();
        $category = category::all();
        return view('shop.pages.product_shop.add-product-shop', compact('brand','category'));
    }


    public function store(Request $request)
    {

        $listProduce = new produce ;
        $listImg = new img ; 
        $vendor = vendor::find(Auth::user()->id);
        $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'imgFile' => 'mimes:jpg,jpeg,png,gif|max:2048',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'imgFile.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				'imgFile.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
			]
        );
        $get_product = $request->file('imgFile');
        
        if ($get_product->isValid()) {

           
        
        $imageName = time().'.'.$request->file('imgFile')->getClientOriginalExtension();

        $request->imgFile->move('upload/product', $imageName);

        $listProduce->name = $request->name;
        $listProduce->unit = $request->unit;
        $listProduce->SKU = $request->SKU;
        $listProduce->desc = $request->desc;
        $listProduce->short_desc = $request->shortdesc;
        $listProduce->category_id = $request->category_id;
        $listProduce->author_id = Auth::user()->id;
        $listProduce->vendor_id = $vendor->id;
$listProduce->price = $request->price;
        $listProduce->discout_price = $request->discout_price;
        $listProduce->status = $request->status;
        $listProduce->top ="0";
        $listProduce->brand =$request->brand;
        $listProduce->rates = "0";
        $listProduce->amount_rate = "0";
       
        $listProduce->save();
           
        $listImg ->url =  $imageName;
        $listImg->status = $request->status;
        $listImg->style = '1';
        $listImg->produce_id= $listProduce->id;
        
        $listImg->post_id='1';
        $listImg ->save();

        foreach($request->imgchitiet as $hinhchitiet)
        {
            $Hinh = Str::random(10);
            $listImg2 = new img ; 
            $imageName2 = time().$Hinh.'.'.$hinhchitiet->getClientOriginalExtension();
            
            $hinhchitiet->move('upload/product', $imageName2);

            $listImg2 ->url =  $imageName2;
            $listImg2->status = $request->status;
            $listImg2->style = '2';
            $listImg2->produce_id= $listProduce->id;
            $listImg2->post_id='1';
            
            $listImg2 ->save();
           
        }
        
        }
        else 
        {
            return alert('THêm Không thành công ');
        }
        return redirect()->route('shopProduct.listShopProduct')->with('messenge','thành công ');
    }

    public function hinhchitiet($id)
    {
        $sp =  produce::find($id);
        //dd($sp);
        $imgchitiet = DB::table('imgs')
        ->where('imgs.style','=',2)        
        ->where('produce_id','=',$id)->get();;
        return view('shop.pages.product_shop.hinhchitiet', compact('imgchitiet','sp'));
    }
}