@extends('admin.layouts.master')

@section('title')
Hồ sơ cá nhân
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Hồ sơ cá nhân</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if(isset($addUser))
                <form class="form-horizontal form-label-left"
                    action="{{route('user.Edit-profile-admin',['id'=>$addUser->id])}}" method="POST"
                    enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="hoverImg">
                                
                                <img id="buttonFile" @if(isset($addUser))
                                    src="../../upload/avatar/{{Auth::user()->avatar}}" @endif alt="avt"
                                    style="height: 200px; width: 200px; border-radius: 50%;cursor: pointer;">

                               <i class="fa fa-camera" aria-hidden="true"></i>

                                <input type="file" name="Hinh" id="file" @if(isset($addUser))
                                    value="{{ $addUser->avatar }}" @endif accept=".jpg, .png, .jpeg" accept="image/*"
                                    onchange="showMyImage(this)" style="display: none;">

                            </div>


                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="form-group row col-md-12 col-sm-12">
                                    <label class="control-label col-md-2 col-sm-2 ">Tài khoản</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" name="user_name" class="form-control"
                                            placeholder="Username....." @if(isset($addUser))
                                            value="{{ $addUser->user_name }}" readonly="readonly" @endif>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group row col-md-12 col-sm-12">
                                    <label class="control-label col-md-2 col-sm-2 ">Tên</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="First name....." @if(isset($addUser))
                                            value="{{ $addUser->first_name }}" @endif>

                                    </div>
                                </div>
                                <div class="form-group row col-md-12 col-sm-12">
                                    <label class="control-label col-md-2 col-sm-2 ">Họ</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Last name....." @if(isset($addUser))
                                            value="{{ $addUser->last_name }}" @endif>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group row col-md-12 col-sm-12 ">
                                    <label class="control-label col-md-2 col-sm-2 ">Ngày sinh</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" name="birthday" class="form-control" @if(isset($addUser))
                                            value="{{ $addUser->birthday }}" @endif>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group row col-md-12 col-sm-12 ">
                                    <label class="control-label col-md-2 col-sm-2 ">Email</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="email" name="email" class="form-control" placeholder="Email....."
                                            @if(isset($addUser)) value="{{ $addUser->email }}" @endif>

                                    </div>
                                </div>
                                <div class="form-group row col-md-12 col-sm-12 ">
                                    <label class="control-label col-md-2 col-sm-2 ">Điện thoại</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="phone" name="phone" class="form-control" placeholder="Phone....."
                                            @if(isset($addUser)) value="{{ $addUser->phone }}" @endif>


                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group row col-md-12 col-sm-12 ">
                                    <label class="control-label col-md-2 col-sm-2 ">Địa chỉ</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Address....." @if(isset($addUser))
                                            value="{{ $addUser->address }}" @endif>
                                    </div>
                                </div>

                                <div class="form-group row col-md-12 col-sm-12">
                                    <label class="control-label col-md-2 col-sm-2 ">Giới tính</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <select class="select2_single form-control" name="gender" tabindex="-1"
                                            @if(isset($addUser)) value="{{ $addUser->gender }}" @endif>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 text-center">
                    <button type="submit" class="btn btn_submit">
                        Cập nhật thông tin
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection