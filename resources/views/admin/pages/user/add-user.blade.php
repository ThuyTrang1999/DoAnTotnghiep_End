@extends('admin.layouts.master')

@section('title')
thêm mới người dùng
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm người dùng </h2><br>
                <form action="{{route('user.xu-ly-them-moi')}}" method="POST" enctype="multipart/form-data">
            </div>
            @csrf
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class = 'alert alert-danger'>
                        <li>{{ $error }}</li>   
                    </div>
                @endforeach
            @endif
            @if(session('thongbao'))
                <div class = 'alert alert-danger'>
                    {{section('thongbao')}}
                </div>
            @endif
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                   
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Tài khoản</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="user_name" class="form-control" placeholder="Nhập tài khoản"
                                    @if(isset($addUser)) value="{{ $addUser->user_name }}" readonly="readonly" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Hình ảnh</label>
                            <input type="file" name="Hinh" id="Hinh"  @if(isset($addUser)) value="{{ $addUser->Hinh }}" @endif/>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Mật khẩu</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu"
                                    @if(isset($addUser)) value="{{ $addUser->password }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Nhập Lại mật khẩu</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="password" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu"
                                @if(isset($addUser)) value="{{ $addUser->repassword }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Tên</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="first_name" class="form-control" placeholder="Nhập tên"
                                    @if(isset($addUser)) value="{{ $addUser->first_name }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Họ</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="last_name" class="form-control" placeholder="Nhập họ"
                                    @if(isset($addUser)) value="{{ $addUser->last_name }}" @endif>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Ngày sinh</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="birthday" placeholder="Nhập ngày sinh" class="form-control" @if(isset($addUser))
                                    value="{{ $addUser->birthday }}" @endif>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Email</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="email" name="email" class="form-control" placeholder="Nhập email"
                                    @if(isset($addUser)) value="{{ $addUser->email }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Điện thoại</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại"
                                    @if(isset($addUser)) value="{{ $addUser->phone }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Địa chỉ</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ"
                                    @if(isset($addUser)) value="{{ $addUser->address }}" @endif>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Giới tính</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="gender" tabindex="-1"
                                    @if(isset($addUser)) value="{{ $addUser->gender }}" @endif>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Quyền</label>
                            <div class="col-md-10 col-sm-10">
                                <select class="select2_single form-control" name="role" tabindex="-1"
                                    @if(isset($addUser)) value="{{ $addUser->role }}" @endif>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">Chủ shop</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Trạng thái</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="status" tabindex="-1"
                                    @if(isset($addUser)) value="{{ $addUser->status }}" @endif>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">
                                Thêm người dùng
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection