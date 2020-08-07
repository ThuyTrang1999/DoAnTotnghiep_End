@extends('admin.layouts.master')

@section('title')
Thêm sản phẩm
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm sản phẩm</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

               

                <form  class="form-horizontal form-label-left" action="{{route('product.xu-ly-cap-nhat',['id'=>$listProduce->id])}}" 
                    method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Tên sản phẩm</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="name" class="form-control" placeholder="tên sản phẩm....." @if(isset($listProduce)) value="{{$listProduce->name}}" @endif  >
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Hình đại diện</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="imgFile" id="imgFile" >
                            </div>
                        </div>

                       

                    </div>
                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Đơn vị</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="unit" class="form-control" placeholder="đơn vị....." @if(isset($listProduce)) value="{{$listProduce->unit}}" @endif >
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">SKU</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="SKU" class="form-control" placeholder="SKU....." @if(isset($listProduce)) value="{{$listProduce->SKU}}" @endif>
                            </div>
                        </div>


                    </div>
                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Mô tả</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea id="" cols="10" name="desc" rows="5" class="form-control"
                                    placeholder="mô tảtả.........." >@if(isset($listProduce)) {{$listProduce->desc}}" @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Mô tả ngắn</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea id="" cols="10" name="shortdesc" rows="5"
                                    class="form-control" placeholder="mô tả ngắn....">@if(isset($listProduce)) {{$listProduce->shortdesc}}" @endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Danh mục</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="category_id" tabindex="-1">
                                    @foreach($listcategory as $listC)
                                    <option @if(isset($listProduce)&& $listC->id == $listProduce->category_id) selected @endif value="{{$listC->id}}" >{{$listC -> cate_name}}</option>
                                    @endforeach
                                </select>
                    </select>
                </div>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Tác giả (shop)</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="author_id" tabindex="-1">
                                    <option value="{{$listProduce->vendor_id}}"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Giá</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="price" class="form-control" placeholder="USD....." @if(isset($listProduce)) value="{{$listProduce->price}}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Giá khuyến mãi</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="discout_price" class="form-control" placeholder="giá khuyến mãi....."@if(isset($listProduce)) value="{{$listProduce->discout_price}}" @endif>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Trạng thái</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="status">

                                @if($listProduce->status == 1){
                                        <option selected value="1">Hoạt động</option>
                                        <option value="2">Không hoạt động</option>}
                                        @else 
                                        <option selected value="2">Không hoạt động</option>
                                        <option value="1">Hoạt động</option>
                                        @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Thương hiệu</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="brand">
                                @foreach($listBrand as $listB)
                                    <option @if(isset($listProduce)&& $listB->id == $listProduce->brand) selected @endif value="{{$listB->id}}" >{{$listB -> brand_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        

<div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Hình chi tiết</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="imgFile2[]" id="imgFile2" multiple>
                            </div>
                        </div>
                    </div>
                    

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">Cập nhật sản phẩm</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection