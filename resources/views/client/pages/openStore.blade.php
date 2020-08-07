@extends('client.layouts.master')

@section('title')
    Trang chủ
@endsection


@section('content')

<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center"> Mở cửa hàng </h2>
                
            
            <div class="x_content">
            <div class="container">
                <form class="form-horizontal form-label-left" action="" method="">
                @csrf
                    <div class="row">
                    <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-4 col-sm-4">Tài khoản</label>
                            <div class="col-md-8 col-sm-8 ">
                                <label for=""></label>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-4 col-sm-4 ">Banner</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="file" name="bannerFile" id="bannerFile" >
                                <img src="#" alt="img_banner" id="img_banner" style="height: 30px; width: 70px;">
                                <!-- show img -->

                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                    <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-4 col-sm-4 ">Tên cửa hàng</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" name="shop_name" placeholder="Tên cửa hàng....."
                                   >
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-4 col-sm-4 ">Logo</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="file" name="logoFile" >
                                <img  src="#"  alt="img_logo" style="height: 30px; width: 50px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-4 col-sm-4 ">Mô tả</label>
                            <div class="col-md-8 col-sm-8 ">
                                <textarea name="desc" class="form-control" id="" cols="10" rows="5"
                                    placeholder="Desc....."></textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-4 col-sm-4 ">Trạng thái</label>
                            <div class="col-md-8 col-sm-8 ">
                                <select name="status" id="" class="form-control" >
                                    <option value="1" >Đang kích hoạt</option>
                                    <option value="0">Ngưng kích hoạt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit btn-primary">Mở cửa hàng</button>
                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>



@endsection