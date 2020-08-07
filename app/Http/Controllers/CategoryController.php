<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = DB::table('categories');
        if($request->search){
            $result->where('categories.cate_name', 'like', '%' .$request->search. '%')->get();
        }

        $listCategorys = $result->paginate(3);
        
        return view('admin.pages.category.list-category', compact('listCategorys'));

    }
    public function create()
    {
        
        return view('admin.pages.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cate_name'=>'bail|required',
            'alilas' => 'bail|required',
        ], [
            'cate_name.required' => 'Loại sản phẩm không được bỏ trống.',
            'alilas.required' => 'Tên khác của sản phẩm không được bỏ trống.',
        ]);
        $category = new Category;
        $category->cate_name = $request->cate_name;
        $category->alilas = $request->alilas;
        $category->status ="1";
        $category->parent_id="1";
        $category->save();
        return redirect()->route('category.listCategory')->with('thongbao','Thêm thành công ');
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
        return redirect()->route('category.listCategory')->with('thongbao','Thêm thành công ');
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
        $this->validate($request, [
            'cate_name'=>'bail|required',
            'alilas' => 'bail|required',
        ], [
            'cate_name.required' => 'Loại sản phẩm không được bỏ trống.',
            'alilas.required' => 'Tên khác của sản phẩm không được bỏ trống.',
        ]);
        $category = Category::find($id);
        $category->cate_name = $request->cate_name;
        $category->alilas = $request->alilas;
        $category->status ="1";
        $category->parent_id="1";
        $category->save();
return redirect()->route('category.listCategory')->with('thongbao','Cập nhật thành công ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.listCategory');
    }
}