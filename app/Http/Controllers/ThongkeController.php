<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\bill_detail;
class ThongkeController extends Controller
{
    public function danhthu(Request $request)
    {
        $sanpham= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id group by produces.id , bill_details.produce_id');
        
        if($request->dayfrom && $request->dayto){
        $sanpham= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id where bill_details.created_at between '."'" .$request->dayfrom. "'".' and '."'".$request->dayto."'".' group by produces.id , bill_details.produce_id');}
        $tongtien = 0 ;

        return view('shop.pages.thongke.thongke', compact('sanpham','tongtien'));
    }
    public function sanphamnoibat(Request $request)
    {
        $sanpham= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id group by produces.id , bill_details.produce_id');
        
        if($request->dayfrom && $request->dayto){
        $sanpham= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id where bill_details.created_at between '."'" .$request->dayfrom. "'".' and '."'".$request->dayto."'".' group by produces.id , bill_details.produce_id');}
        $tongtien = 0 ;

        return view('shop.pages.thongke.sanphamnoibat', compact('sanpham','tongtien'));
    }
    public function sanphamquantam(Request $request)
    {
        $sanpham= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id group by produces.id , bill_details.produce_id');
        
        if($request->dayfrom && $request->dayto){
        $sanpham= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id where bill_details.created_at between '."'" .$request->dayfrom. "'".' and '."'".$request->dayto."'".' group by produces.id , bill_details.produce_id');}
        $tongtien = 0 ;

        return view('shop.pages.thongke.sanphamnoibat', compact('sanpham','tongtien'));
}
    public function thongkeadmin(Request $request)
    {
        $thongke= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id group by produces.id , bill_details.produce_id');
        
        if($request->dayfrom && $request->dayto){
        $thongke= DB::select('select produces.price,bill_id,bill_details.created_at,name,produces.price,bill_details.bill_id,bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id where bill_details.created_at between '."'" .$request->dayfrom. "'".' and '."'".$request->dayto."'".' group by produces.id , bill_details.produce_id');}
        $tongtien = 0 ;

        return view('admin.pages.statistical.list-statistical', compact('thongke','tongtien'));
    }
}