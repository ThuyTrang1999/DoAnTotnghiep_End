<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use Illuminate\Support\Str;
use App\vendor;
use Illuminate\Support\Facades\Input;
use App\img;
use App\user;
use App\brand;
use App\produce;
use App\post;
use App\ProductComment;
use App\Http\Requests\ProductCommentRequest;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilderFacade as QueryBuilder;
class ProduceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = category::all();
        $result = DB::table('produces')
            ->join('categories', 'produces.category_id', '=', 'categories.id')
            ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
            ->join('vendors', 'produces.author_id', '=', 'vendors.id')
            // ->join('brand', 'produces.brand', '=', 'brand.id')
            ->where('imgs.style','=',1);
            // dd($result);
        if($request->search){
            $result->where('produces.name', 'like', '%' .$request->search. '%')->get();
        }
        if($request->cate){
            $result->where('categories.id',$request->cate)->get();
        }
        if($request->status){
            $result->where('produces.status',$request->status)->get();
        }
        
        $listProduce = $result->paginate(10);
        return view('admin.pages.product.list-product', compact('listProduce','categories'));
    }
    public function select(Request $request)
    {
        $listCate = DB::table('categories')->get();
        $listShop=DB::table('vendors')->get();


        // $products = QueryBuilder::for(Product::class)
        // ->allowedFilters([
        //     AllowedFilter::exact('cateName', 'brand_id'),
        //     AllowedFilter::exact('shopName', 'category_id'),
        //     ])
        // ->get();
       if($request->key_word){
            $result=DB::table('produces')
            ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
            ->join('vendors', 'vendors.id', '=', 'produces.vendor_id')
            ->where('produces.name', 'like', '%' .$request->key_word. '%');
       }
    
   
    
        else if($request->orderby)
        {
            $orderby = $request->orderby;
            $Produce=DB::table('produces')
            ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
            ->join('vendors', 'vendors.id', '=', 'produces.vendor_id');
            switch ($orderby){
                case 'desc':
                    $result= $Produce->orderBy('produces.id', 'DESC'); break;
                case 'asc':
                    $result= $Produce->orderBy('produces.id', 'ASC');break;
                case 'price_max':
                    $result=$Produce->orderBy('produces.discout_price','ASC'); break;
    
                case 'price_min':
                    $result=$Produce->orderBy('produces.discout_price','DESC'); break;
                
            }
        }
           else{
                $result = DB::table('produces')
                ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
                ->join('vendors', 'vendors.id', '=', 'produces.vendor_id');
            }


            


            $listProduces=$result->paginate(12);
            
            return view('client.pages.list-product', compact('listProduces','listCate', 'listShop'));
        }

    
    
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $listcategory=category::all();
        $listUser =user::all();
        $listBrand = brand::all();
        
        return view('admin.pages.product.add-product', compact('listcategory','listUser','listBrand'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $listProduce = new produce ;
        $listImg = new img ; 
        
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
        $get_product2 = $request->file('imgFile2');
        if ($get_product->isValid()) {

           
        
        $imageName = time().'.'.$request->file('imgFile')->getClientOriginalExtension();

        $request->imgFile->move('upload/product', $imageName);

        $listProduce->name = $request->name;
        $listProduce->unit = $request->unit;
        $listProduce->SKU = $request->SKU;
        $listProduce->desc = $request->desc;
        $listProduce->short_desc = $request->shortdesc;
        $listProduce->category_id = $request->category_id;
        $listProduce->author_id = "1";
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

        foreach($request->imgFile2 as $hinhchitiet)
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
        return redirect()->route('product.listProduct')->with('messenge','thành công ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listProduce = produce::find($id);
        $listcategory=category::all();
        $listUser =user::all();
        $listBrand = brand::all();
        
        return view('admin.pages.product.edit-product', compact('listcategory','listUser','listBrand','listProduce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listProduce = new produce ;
        $listImg = new img ; 
        
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
        $get_product2 = $request->file('imgFile2');
        if ($get_product->isValid()) {

           
        
        $imageName = time().'.'.$request->file('imgFile')->getClientOriginalExtension();

        $request->imgFile->move('upload/product', $imageName);

        $listProduce->name = $request->name;
        $listProduce->unit = $request->unit;
        $listProduce->SKU = $request->SKU;
        $listProduce->desc = $request->desc;
        $listProduce->short_desc = $request->shortdesc;
        $listProduce->category_id = $request->category_id;
        $listProduce->author_id = "1";
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

        foreach($request->imgFile2 as $hinhchitiet)
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
        return redirect()->route('product.listProduct')->with('messenge','thành công ');
    }


    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $linhVuc = LinhVuc::find($id);
        // $linhVuc->delete();
        // return redirect()->route('linh-vuc.danh-sach');
    }

    // show detail
    public function detail(Request $req){

        $singleProduct = produce::join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.id', $req->id)
        ->with(['comments' => function ($query) {
            $query->orderByDesc('created_at');
        }])
        ->first();

        $imgDetail=produce::join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->where('produces.id', $req->id)->where('style','=',2)
        ->get();

        $related_product = produce::join('vendors', 'produces.vendor_id', '=', 'vendors.id')
        ->join('imgs', 'produces.id', '=', 'imgs.produce_id')
        ->whereNotIn('produces.id', [$req->id])->get();
        return view('client.pages.detail', compact('singleProduct', 'related_product','imgDetail'));
    }

    

    public function rating(ProductCommentRequest $request)
    {
        $data = $request->validated();

        $productComment = ProductComment::create($data);
        // product_id, content, rate, user_id
        if (!$productComment) {
            return response()->json([
                'message' => 'Có lỗi xảy ra. Vui lòng thử lại.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // response()->json($data, $statusCode = 200);

        return response()->json([
            'message' => 'Đánh giá thành công',
            'data' => $productComment->load('customer')
        ], Response::HTTP_OK);
    }

  
    

    public function filterNewProduct(){

        $listNewProduct=DB::table('produces')->get();
        $listShop=DB::table('vendors')->get();
        $Category=DB::table('categories')->get();
        $listProduces=$listNewProduct->OrderByDescending('produces.id')->paginate(5);
        return view('client.pages.list-product', compact('Category','showShop','listProduces'));
    }

    public function filterProduct(Request $request){
        $data=$request->all();
        $productUrl="";
        if(!empty($data['productFilter'])){
            foreach($data['productFilter'] as $product){
                if(empty($productUrl)){
                    $productUrl="&category".$product;
                }
                else{
                    $productUrl .="-".$product;

                }
            }
        }

      
    }



}