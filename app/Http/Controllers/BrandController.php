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
         $brand = brand::find($id);
         return view('admin.pages.brand.edit-brand', compact('brand'));
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
        $brand = brand::find($id);
        $brand->brand_name = $request->name;       
        $brand->save();
        return redirect()->route('brand.listBrand')->with('message','thêm thàng công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        return redirect()->route('brand.listBrand');
    }
}
