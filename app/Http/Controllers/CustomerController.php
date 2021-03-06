<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\customer;
use Hash;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesCustomers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\PasswordReset;
use App\Mail\ResetPasswordMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $listCustomer2 = customer::paginate(3);
        $result=DB::table('customers');
        if($request->search){
            $result->where('customers.name', 'like', '%' .$request->search. '%')->get();
        }
        if($request->role){
            $result->where('customers.role',$request->role)->get();
        }
        if($request->status){
            $result->where('customers.status',$request->status)->get();
        }
        $listCustomer = $result->paginate(3);
        return view('admin.pages.customer.list-customer',['listCustomer'=>$listCustomer],['listCustomer2'=>$listCustomer2]);
    }
    public function create()
    {
        $dataCustomer = customer::all();
        return view('client.index', compact('dataCustomer'));
    }
    public function destroy($id)
    {
         $Addcustomers = customer::find($id);
         $Addcustomers->status = "2";
         $Addcustomers->save();
         return redirect()->route('customer.listCustomer');
    }
    public function profileClient($id)
    {

        $Addcustomers =DB::table('customers')
        ->find($id);
       
        return view('client.pages.profile', compact('Addcustomers'));
    }
    public function profileEditClient(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Tên không được để trống.',
            'name.max'=>':attribute Không được quá :max ký tự',
            'phone.required' => 'Số điện thoại không được để trống.',
            'address.required' => 'Địa chỉ không được để trống.',
        ]);
         $Addcustomers = customer::find($id);
         $Addcustomers->name = $request->name;
         $Addcustomers->gender = $request->gender;
         $Addcustomers->address = $request->address;
         $Addcustomers->phone = $request->phone;
         $Addcustomers->email = $request->email;
         if($request->hasFile('Hinh'))
         {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
            {
                return redirect()->route('client.pages.profile')->with('Loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg ');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
           
            while(file_exists("upload/cus_avt/".$Hinh))
            {
                $Hinh = Str::random(4)."_".$name;
               
            }
            
           $file->move("upload/cus_avt",$Hinh);
            @unlink("upload/cus_avt/".$Addcustomers->avatar);
            $Addcustomers->avatar = $Hinh;
        }
        $Addcustomers->save();
         return redirect()->route('client.index')->with(['thongbao' => 'Cập nhật thành công ']);
    }
  
    public function dangNhapClient(){
        $showShop = DB::table('vendors')->get();
        $Category=DB::table('categories')->get();
        return view('client.layouts.login', compact('showShop','Category'));
        
    }
    public function xuLyDangNhapClient(Request $request){
        
        $email = $request->emailClient;
        $password = $request->passClient; 
        $status = 1;
        $this->validate($request, [ 
            'emailClient' => 'required',
            'passClient' => 'required|max:20|min:4',

        ], [
            'emailClient.required' => 'Bạn chưa nhập email', 
            'passClient.required' => 'Bạn chưa nhập mật khẩu.',
            'passClient.min' => 'Mật khẩu phải lớn hơn 4 kí tự.',
            'passClient.max' => 'Mật khẩu phải nhỏ hơn 20 kí tự.',    
        ]);
                       
        if (Auth::guard('customer')->attempt(['email'=>$email , 'password'=>$password, 'status'=>$status])  )
        {
            return redirect()->route('client.index'); 
        }
        
        else
        {
            return redirect()->route('dang-nhap-client');
        }
    }
    public function dangKy(){
        
        return view('client.layouts.register');
        
    }
    public function xuLyDangKy(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Tên không được để trống.',
            'name.max'=>':attribute Không được quá :max ký tự',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu tối thiểu là 6 ký tự.',                                                                                                                                                       
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại.',
            'email.email' => 'Email chưa đúng định dạng.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'address.required' => 'Địa chỉ không được để trống.',
        ]);
        
        $Addcustomers = new customer();
        $Addcustomers->name = $request->name;
        $Addcustomers->password =  Hash::make($request->password);
        $Addcustomers->gender = $request->gender;
        $Addcustomers->address =  $request->address;
        $Addcustomers->role =  "2";
        $Addcustomers->phone = $request->phone;
        $Addcustomers->email = $request->email;
        $Addcustomers->status = 0;
        if($request->hasFile('Hinh'))
{
           $file = $request->file('Hinh');
           $duoi = $file->getClientOriginalExtension();
           if($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
           {
               return redirect()->route('client.pages.profile')->with('Loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg ');
           }
           $name = $file->getClientOriginalName();
           $Hinh = Str::random(4)."_".$name;
          
           while(file_exists("upload/cus_avt/".$Hinh))
           {
               $Hinh = Str::random(4)."_".$name;
           }
           $file->move("upload/cus_avt",$Hinh);
           $Addcustomers->avatar = $Hinh;
       }
        $Addcustomers->save();
        return redirect()->route('dang-nhap-client');
    }

    public function dangXuatClient(){
        Auth::guard('customer')->logout();
        return redirect()->route('client.index');
    }
  


    public function quenMatKhau()
    {
        return view('client.layouts.forgot-password');
    }

    public function verifyEmail(Request $request)
    {
        $email = $request->email;

        $this->validate($request, [ 
            'email' => 'required|email'
        ], [
            'email.required' => 'Bạn chưa nhập tên đăng nhập',
            'email.email' => 'Email chưa đúng định dạng'
        ]);

        $customers = customer::where('email', $email)->first();
        if (!$customers) {
            return redirect()->route('quen-mat-khau')->withErrors([
                'email' => 'Email không tồn tại.'
            ])
            ->withInput();
        }

        $token = str_random(60);

        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Send mail
        Mail::to($email)->send(new ResetPasswordMail($token));

        return redirect()->route('quen-mat-khau')
            ->with([
                'thongbao' => 'Bạn vừa yêu cầu khôi phục mật khẩu. Một email đã được gửi vào hòm thư của bạn. Vui lòng kiểm tra!!!'
            ]);
    }

    public function getResetPass(Request $request)
    {
        if (empty($request->token)) {
            return redirect()->route('dang-nhap');
        }

        return view('client.pages.reset_password')->with([
            'token' => $request->token
        ]);
    }

    public function edit($id)
    {
         $cus = customer::find($id);
         return view('admin.pages.customer.edit-customer', compact('cus'));
    }

    public function update(Request $request,$id)
    {
        $cus = customer::find($id);
        $cus->status = $request->status; 
        $cus->role = $request->role; 
        $cus->save();
        return redirect()->route('customer.listCustomer',compact('cus')); 
    }
    public function postResetPass(Request $request)
    {
        $this->validate($request, [ 
            'reset_token' => 'required',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required|same:mat_khau'
        ], [
            'reset_token.required' => 'Token is missing',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'mat_khau.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự.',
            'nhap_lai_mat_khau.required' => 'Vui lòng nhập lại mật khẩu.',
            'nhap_lai_mat_khau.same' => 'Mật khẩu nhập lại không khớp.'
        ]);

        $token = PasswordReset::where('token', $request->reset_token)->first();
        if (!$token) {
            return redirect()->back()
                ->withErrors([
                    'errors' => 'Token không tồn tại hoặc đã hết hạn.'
                ]);
        }

        $customers = customer::where('email', $token->email)->update([
            'password' => Hash::make($request->mat_khau)
        ]);
        if (!$customers) {
            return redirect()->back()
                ->withErrors([
                    'errors' => 'Có lỗi xảy ra. Vui lòng thử lại.'
                ]);
        }

        PasswordReset::where('token', $request->reset_token)->delete();

        return redirect()->back()
                ->with([
                    'thongbao' => 'Bạn đã đổi mật khẩu thành công.'
                ]);
    }


}