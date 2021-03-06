@extends('admin.layouts.master')

@section('title')
Thêm mới cửa hàng
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2> Thêm cửa hàng </h2>
                <form action="{{route('vendor.xu-ly-them-moi-vendor')}}" method="POST"
                    enctype="multipart/form-data">
            </div>
            @csrf
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Shop name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" name="shop_name" placeholder="Shop name....."
                                    >
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2">Username</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select name="id_user" id="" class="form-control" @if(isset($addVendor))
                                    value="{{$addVendor->id_user}}" @endif>
                                    @foreach($dataUser as $data)
                                    <option @if(isset($addVendor)) @if($data->id == $addVendor->cus_id) selected
                                        @endif value="{{ $data->id}}">{{ $data->name}}
                                    </option>
                                    @endif value="{{ $data->id}}">{{ $data->name}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Banner</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="bannerFile" id="bannerFile" >
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Logo</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="logoFile" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="desc" class="form-control" id="" cols="10" rows="5"
                                    placeholder="Desc.....">@if(isset($addVendor)) {{ $addVendor->desc}}
                                    @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Status</label>
                            <div class="col-md-10 col-sm-10 ">
                            <select class="select2_single form-control" name="status" tabindex="-1"
                                    @if(isset($addVendor)) value="{{ $addVendor->status }}" @endif>
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
                             Thêm mới 
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection