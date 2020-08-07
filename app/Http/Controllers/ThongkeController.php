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
        //$sanpham = DB::table('bill_details')
        //->join('produces', 'bill_detail.produces_id', '=', 'produces.id') 
        //->groupBy('produce_id')->sum('quanlity');
        //->sum('quanlity');
        
        //$sanpham = bill_detail::all();

        $sanpham = DB::select('select bill_details.produce_id,sum(quanlity) as tsl from bill_details inner join produces on bill_details.produce_id = produces.id group by produces.id , bill_details.produce_id');
        //dd($sanpham);
        return view('shop.pages.thongke.thongke', compact('sanpham'));
    }
}
