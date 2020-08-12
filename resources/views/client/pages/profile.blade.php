@extends('client.layouts.master')

@section('title')
Thông tin cá nhân
@endsection

@section('content')

<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center"> Hồ sơ cá nhân </h2><br>
                <div class="x_content">
                    <div class="container">
                        <form class="form-horizontal form-label-left"
                            action="{{route('xu-ly-cap-nhat',['id'=>Auth::guard('customer')->user()->id])}}"
                            method="POST" enctype="multipart/form-data">
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
                            @if(session('thongbao'))
                            <div class='alert alert-success'>
                                {{section('thongbao')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group row col-md-12 col-sm-12">

                                        <div class="col-md-10 col-sm-10 ">
                                        <div class="hoverImg">
                                            <img id="buttonFile" @if(isset($Addcustomers))
                                                src="../../upload/cus_avt/{{Auth::guard('customer')->user()->avatar}}"
                                                @endif alt="avt"
                                                style="height: 200px; width: 200px; border-radius: 50%;cursor: pointer;">
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            <input type="file" name="Hinh" id="file" @if(isset($addUAddcustomersser))
                                                value="{{ $Addcustomerss->avatar }}" @endif accept=".jpg, .png, .jpeg"
                                                accept="image/*" onchange="showMyImage(this)" style="display: none;">
                                        </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="form-group row col-md-12 col-sm-12">
                                            <label class="control-label col-md-2 col-sm-2 ">Họ tên</label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Nhập tài khoản" @if(isset($Addcustomers))
                                                    value="{{ $Addcustomers->name }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-md-12 col-sm-12">
                                            <label class="control-label col-md-2 col-sm-2 ">Giới tính</label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <select class="select2_single form-control" name="gender" tabindex="-1">
                                                    @if($Addcustomers->gender == 1){
                                                    <option selected value="1">Nam</option>
                                                    <option value="2">Nữ</option>}
                                                    @else
                                                    <option selected value="2">Nữ</option>
                                                    <option value="1">Nam</option>
                                                    @endif
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row col-md-12 col-sm-12 ">
                                            <label class="control-label col-md-2 col-sm-2 ">Địa chỉ</label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Nhập địa chỉ" @if(isset($Addcustomers))
                                                    value="{{ $Addcustomers->address }}" @endif>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group row col-md-12 col-sm-12 ">
                                            <label class="control-label col-md-2 col-sm-2 ">Điện thoại</label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <input type="phone" name="phone" class="form-control"
                                                    placeholder="Nhập điện thoại" @if(isset($Addcustomers))
                                                    value="{{ $Addcustomers->phone }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group row col-md-12 col-sm-12 ">
                                            <label class="control-label col-md-2 col-sm-2 ">Email</label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Nhập email" @if(isset($Addcustomers))
                                                    value="{{ $Addcustomers->email }}" readonly="readonly" @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn_submit btn-primary">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection