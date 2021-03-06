<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\vendor;
use App\customer;
use App\user;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = DB::table('vendors')->select('vendors.status as tl','vendors.shop_name','vendors.desc_vendor','vendors.logo','vendors.banner','vendors.id','name')->join('customers', 'vendors.cus_id', '=', 'customers.id'); 
        if($request->search){
            $result->where('vendors.shop_name', 'like', '%' .$request->search. '%')->get();
        }
        $listVendors = $result->paginate(3);
        return view('admin.pages.shop.list-shop',['listVendors'=>$listVendors]);
        
    }
    public function create()
    {
        $dataUser = customer::all();
        return view('admin.pages.shop.add-shop', compact('dataUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
       
        $vendor = new vendor;
        $vendor->shop_name = $request->shop_name;
        $vendor->cus_id = $request->id_user;
        // $vendor->banner = $request->bannerFile->getClientOriginalName();
        $get_images_banner=$request->file('bannerFile');
        $vendor->desc_vendor =  $request->desc;
        // $vendor->logo = $request->logoFile->getClientOriginalName();
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
        return redirect()->route('vendor.listVendor');
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
    {   $addVendor = vendor::find($id);
        $dataUser = customer::all();
        
        return view('admin.pages.shop.edit-shop', compact('addVendor', 'dataUser'));    
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
         $addVendor = vendor::find($id);
         $addVendor->shop_name = $request->shop_name;
         $addVendor->cus_id = $request->id_user;
         $set_images_banner=$request->file('bannerFile');
         $addVendor->desc_vendor = $request->desc;
         $set_images_logo = $request->file('logoFile');
         $addVendor->status = $request->status;

         if($set_images_banner && $set_images_logo){
            $new_images_banner=time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." .$request->bannerFile->getClientOriginalName();
            $new_images_logo=time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." .$request->logoFile->getClientOriginalName();
            $set_images_banner->move('upload/banner', $new_images_banner);
            $set_images_logo->move('upload/logo', $new_images_logo);
            $addVendor->banner = $new_images_banner;
            $addVendor->logo = $new_images_logo;
            $addVendor->save();
        }

         $addVendor->save();
         return redirect()->route('vendor.listVendor')->with(['flash_message' => 'Cập nhật cửa hàng thành công ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteVendor = vendor::find($id);
        $deleteVendor->status = 2;
        $deleteVendor->save();
        return redirect()->route('vendor.listVendor');
    }
}