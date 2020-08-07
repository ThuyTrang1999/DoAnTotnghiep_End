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
use Session;

class BillController extends Controller
{
    public function index(Request $request)
    {
        //$listBrand = brand::all();
        $result = DB::table('bills')
        ->join('customers', 'bills.cus_id', '=', 'customers.id')
        ->join('vendors', 'bills.user_id', '=', 'vendors.id');
        if($request->search){
            $result->where('bills.', 'like', '%' .$request->search. '%');
        }
        $listBill= $result->get();
        dd($listBill);
        return view('admin.pages.bill.bill', compact('listBill'));

    }
    public function edit($id)
    {
        $result = DB::table('bill_details')
        ->join('produces', 'bill_details.produce_id', '=', 'produces.id')
        ->where('bill_id', $id);
         $bill_detail=$result->get();
        return view('admin.pages.bill.bill-detail', compact('bill_detail'));
    }
    public function postCheckout(){
        return view('client.pages.checkout');
    }
    public function saveCheckoutCustommer(Request $req){

        $cart=Session::get('Cart');
        // dd($cart);
        $cus_data = new customer;
        $cus_data->name = $req->cus_name;
        $cus_data->password = bcrypt(123456);
        $cus_data->gender = $req->cus_gender;
        $cus_data->address = $req->cus_address;
        $cus_data->phone = $req->cus_phone;
        $cus_data->email = $req->cus_email;
        $cus_data->status ="1";
        $cus_data->save();

        $bill_data=new bill;
        $bill_data->payment = "Tiền mặt";
        $bill_data->note = $req->note;
        $bill_data->total = Session::get("Cart")->TongTien;
        $bill_data->cus_id = $cus_data->id;
        $bill_data->user_id = '1';
        $bill_data->status = "1";
        $bill_data->save();
        foreach(Session::get("Cart")->sanpham as $item){
            $bill_detail_data = new bill_detail;
            $bill_detail_data->quanlity = $item['quanty'];
            $bill_detail_data->price = ($item['price']/$item['quanty']);
            $bill_detail_data->bill_id = $bill_data->id;
            $bill_detail_data->produce_id = $item['ttsanpham']->id;
            $bill_detail_data->status = "1";
            $bill_detail_data->save();
        }
        Session::forget('Cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    // Xuat hoa don theo cua shop
    public function billShop(){
        $billShop=DB::table('customers')
        ->join('bills', 'customers.id', '=', 'bills.cus_id')
        ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
        ->get();
        // dd($billShop);
        return view('shop.pages.bill',  compact('billShop'));
    }



}