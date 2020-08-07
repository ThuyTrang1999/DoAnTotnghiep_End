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

                @if(isset($listProduce))

                @else

                <form  class="form-horizontal form-label-left" action="{{route('product.xu-ly-them-moi')}}" 
                    method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Tên sản phẩm</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="name" class="form-control" placeholder="tên sản phẩm.....">
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
                                <input type="text" name="unit" class="form-control" placeholder="đơn vị.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">SKU</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="SKU" class="form-control" placeholder="SKU.....">
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
                            <label class="control-label col-md-2 col-sm-2 ">Danh mục</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="category_id" tabindex="-1">
                                    @foreach($listcategory as $listC)
                                    <option value="{{$listC->id}}">{{$listC -> cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">tác giả (shop)</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="author_id" tabindex="-1">
                                    
                                    <option value="1">admin</option>

                                    
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Giá</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="price" class="form-control" placeholder="USD.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Giá khuyến mãi</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="discout_price" class="form-control" placeholder="giá khuyến mãi.....">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Trạng thái</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="status">

                                    <option value="1">Đang hoạt động</option>
                                    <option value="2">Ngưng hoạt động</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Thương hiệu</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="brand">
                                    @foreach($listBrand as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                            <button type="submit" class="btn btn_submit">Thêm sản phẩm</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection