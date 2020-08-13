@extends('admin.layouts.master')

@section('title')
Cập nhật người dùng
@endsection
@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection
@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật người dùng </h2><br>
                <form action="{{route('user.xu-ly-cap-nhat',['id'=>$addUser->id])}}" method="POST"
                    enctype="multipart/form-data">
            </div>
            @csrf
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <div class='alert alert-danger'>
                    <li>{{ $error }}</li>
                </div>
                @endforeach
            </ul>
            @endif
            @if(session('Thongbao'))
            <div class='alert alert-success'>
                {{section('Thongbao')}}
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
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Hình ảnh</label>
                            <div class="col-md-10 col-sm-10 ">
                                <div class="hoverImg">
                                    <img id="buttonFile" src="../../upload/avatar/{{$addUser->avatar}}" alt="avt"
                                        style="height: 70px; width: 70px; cursor: pointer;">
                                    <input type="file" name="Hinh" id="file" @if(isset($addUser))
                                        value="{{ $addUser->avatar }}" @endif accept=".jpg, .png, .jpeg"
                                        accept="image/*" onchange="showMyImage(this)" style="display: none;">
                                </div>
                            </div>

                        </div>
                        <!-- <div class="form-group row col-md-6 col-sm-6">
                         <input type="checkbox" id="changePassword" name="changePassword">
                        <input type="checkbox" id="changePassword" name="changePassword">
                            <label class="control-label col-md-2 col-sm-2 ">Đổi mật khẩu</label>
                            <div class="col-md-10 col-sm-10">
                                <input  type="password" name="password" class="form-control password" placeholder="Nhập mật khẩu" disabled="">
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Nhập Lại mật khẩu</label>
                            <div class="col-md-10 col-sm-10">
                                <input type="password" name="repassword" class="form-control password" placeholder="Nhập lại mật khẩu" disabled="">
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Mật khẩu</label>
                            <div class="col-md-10 col-sm-10">
                                <input type="password" name="password" class="form-control password"
                                    placeholder="Nhập mật khẩu" @if(isset($addUser)) value="{{ $addUser->password }}"
                                    @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Nhập Lại mật khẩu</label>
                            <div class="col-md-10 col-sm-10">
                                <input type="password" name="repassword" class="form-control password"
                                    placeholder="Nhập lại mật khẩu" @if(isset($addUser))
                                    value="{{ $addUser->password }}" @endif>
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
                                <input type="text" name="birthday" class="form-control" @if(isset($addUser))
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
                                <select class="select2_single form-control" name="gender" tabindex="-1">
                                    @if($addUser->gender == 1){
                                    <option selected value="1">Nam</option>
                                    <option value="2">Nữ</option>}
                                    @else
                                    <option selected value="2">Nữ</option>
                                    <option value="1">Nam</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Quyền</label>
                            <div class="col-md-10 col-sm-10">
                                <select class="select2_single form-control" name="role" tabindex="-1">
                                    <option selected value="1">Quản trị viên</option>
                                  
                                </select>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Trạng thái</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="status" tabindex="-1">
                                    @if($addUser->status == 1){
                                    <option selected value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>}
                                    @else
                                    <option selected value="2">Không hoạt động</option>
                                    <option value="1">Hoạt động</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">
                                Cập nhật người dùng
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->
<script type="text/javascript">
$(document).ready(function() {
    $("#changePassword").change(function() {
        if ($(this).is(":checked")) {
            $(".password").removeAttr('disabled');
        } else {
            $(".password").attr('disabled', '');
        }
    })
})
</script>
@endsection