@extends('shop.layouts.master')

@section('title_shop')
Home shop
@endsection

@section('shop_main_content')
<div class="row mt-10">
    <div class="col-sm-12">
        <div class="single-banner shop-page-banner">
            <a href="#">
                <img src="{{ asset('upload/banner/banner7.png')}}" alt="Li's Static Banner">
            </a>
        </div>
    </div>
</div>

<div class="seller mt-20">
    <div class="seller_title ">
        <h4>Danh sách cần làm</h4>
    </div>
    <div class="seller_content">
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
                <div class="seller_item about-image-wrap btn  btn-success">
                    <p class="seller_num">0</p>
                    <span>Hóa đơn chờ xử lý</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-primary">
                    <p class="seller_num">0</p>
                    <span>Hóa đơn đã xử lý</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-secondary">
                    <p class="seller_num">0</p>
                    <span>Số đơn hàng</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-info ">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm hết hàng</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-danger">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm bị khóa</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-warning">
                    <p class="seller_num">0</p>
                    <span class="text-white">Chương trình khuyến mãi</span>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection