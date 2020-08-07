@extends('admin.layouts.master')

@section('title')
thêm mới user
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2> Profile user </h2><br>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar_img">
                                    <img src="" alt="">
                                </div>
                                <input type="file" name="Hinh" id="HinhProfile" class="form-control row  col-sm-10" />
                                <div class="profile_Username text-center">
                                    <h2 class="text-center">Họ và tên</h2>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Tài khoản</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="text" name="user_name" class="form-control"
                                                placeholder="Username.....">

                                        </div>
                                    </div>
                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Mật khẩu</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password.....">


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-md-12 col-sm-12 ">
                                        <label class="control-label col-md-2 col-sm-2 ">Nhập Lại mật khẩu</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="password" name="repassword" class="form-control"
                                                placeholder="RePassword.....">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Tên</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="First name.....">

                                        </div>
                                    </div>
                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Họ</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Last name.....">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group row col-md-12 col-sm-12 ">
                                        <label class="control-label col-md-2 col-sm-2 ">Ngày sinh</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="text" name="birthday" class="form-control">

                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group row col-md-12 col-sm-12 ">
                                        <label class="control-label col-md-2 col-sm-2 ">Email</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email.....">

                                        </div>
                                    </div>
                                    <div class="form-group row col-md-12 col-sm-12 ">
                                        <label class="control-label col-md-2 col-sm-2 ">Điện thoại</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="phone" name="phone" class="form-control"
                                                placeholder="Phone.....">


                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group row col-md-12 col-sm-12 ">
                                        <label class="control-label col-md-2 col-sm-2 ">Địa chỉ</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Address.....">
                                        </div>
                                    </div>

                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Giới tính</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <select class="select2_single form-control" name="gender" tabindex="-1">
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Quyền</label>
                                        <div class="col-md-10 col-sm-10">
                                            <select class="select2_single form-control" name="role" tabindex="-1">
                                                <option value="1">Admin</option>
                                                <option value="0">Staff</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-md-12 col-sm-12">
                                        <label class="control-label col-md-2 col-sm-2 ">Trạng thái</label>
                                        <div class="col-md-10 col-sm-10 ">
                                            <select class="select2_single form-control" name="status" tabindex="-1">
                                                <option value="0">Action</option>
                                                <option value="1">UnAction</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <button type="submit" class="btn btn_submit">
                                    Edit profile
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection