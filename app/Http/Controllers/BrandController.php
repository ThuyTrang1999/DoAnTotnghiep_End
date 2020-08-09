<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\brand;
class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$listBrand = brand::all();
        $result = DB::table('brand');
        if($request->search){
            $result->where('brand.brand_name', 'like', '%' .$request->search. '%')->get();
        }
        $listBrand= $result->paginate(3);
        return view('admin.pages.brand.list-brand', compact('listBrand'));
    }
    public function create()
    {
        
        return view('admin.pages.brand.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new brand;
        $brand->brand_name = $request->name;       
        $brand->status ="1";
        $brand->save();
        return redirect()->route('brand.listBrand')->with('message','thêm thàng công');
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
        // $linhVuc = LinhVuc::find($id);
        // return view('linh-vuc.form', compact('linhVuc'));
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
        // $linhVuc = LinhVuc::find($id);
        // $linhVuc->ten_linh_vuc = $request->ten_linh_vuc;
        // $linhVuc->save();
        // return redirect()->route('linh-vuc.danh-sach');
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
}
