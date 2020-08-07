@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')
<div class="shop_add_product">
    <div class="row">
        <div class="col-md-12" style="margin: 0 auto;">
            <div class="x_panel">
                <div class="li-product-tab mt-10">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#"><span>Thêm sản phẩm</span></a></li>
                    </ul>
                </div>
                <div class="x_content mt-20">
                    <form class="form-horizontal form-label-left" action="{{route('shopProduct.xu-ly-them-moi')}}" 
                    method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Tên Sản Phẩm</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" name="name" class="form-control" placeholder="Tên.....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Hình Ảnh</label>
                                <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="imgFile" id="imgFile" >
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Giá</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input  name="price" class="form-control" placeholder="Giá..">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Giá khuyến mãi</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" name="discout_price"  class="form-control" placeholder="Giá khuyến mãi.....">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Mô tả</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea id="" cols="10" name="desc" rows="5" class="form-control"
                                    placeholder="..........."></textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Mô tả ngắn</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea id="" cols="10" name="shortdesc" rows="5"
                                    class="form-control" placeholder="..........."></textarea>
                            </div>
                        </div>


                        </div>

                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Đơn Vị</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control" name="unit" placeholder="Đơn vị ..">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Danh Mục</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select class="select2_single form-control" name="category_id" tabindex="-1">
                                    @foreach($category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                        
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">SKU</label>
                                <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="SKU" class="form-control" placeholder="SKU.....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Thương Hiệu</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select class="select2_single form-control" name="brand" tabindex="-1">
                                    @foreach($brand as $br)
                                        <option value="{{$br->id}}">{{$br->brand_name}}</option>
                                        
                                    @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Hình Chi Tiết</label>
                                <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="imgchitiet[]" id="imgchitiet" multiple>
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Trạng Thái</label>
                                <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="status">

                                    <option value="1">Đang hoạt động</option>
                                    <option value="2">Ngưng hoạt động</option>

                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <button type="submit" class="btn btn-success">Thêm Sản Phẩm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection