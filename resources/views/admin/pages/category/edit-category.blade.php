
@extends('admin.layouts.master')

@section('title')
Cập nhật loại sản phẩm
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật loại sản phẩm</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <form class="form-horizontal form-label-left" action="{{route('category.xu-ly-cap-nhat')}}" method="POST" >
            @csrf
                <div class="row">
                    <div class="form-group row col-md-6 col-sm-6">
                        <label class="control-label col-md-2 col-sm-2 ">Tên loại</label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" class="form-control" placeholder="Nhập tên loại " name="cate_name" @if(isset($category)) value ="{{ $category->name}}" @endif>
                        </div>
                    </div>
                    <div class="form-group row col-md-6 col-sm-6">
                        <label class="control-label col-md-2 col-sm-2 ">Tên thay thế</label>
                        <div class="col-md-10 col-sm-10 ">
                            <input type="text" class="form-control" placeholder="Nhập tên khác" name="alilas" @if(isset($category)) value ="{{ $category->alilas}}" @endif >
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 text-center">
                        <button type="submit" class="btn btn_submit">Cập nhật loại sản phẩm</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection