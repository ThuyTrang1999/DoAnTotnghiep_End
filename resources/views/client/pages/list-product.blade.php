@extends('client.layouts.master')

@section('title')
Trang danh sách
@endsection


@section('content')

<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-30 ">

                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box list-product-nav">
                    <div class="sidebar-title">
                        <div class="li-sidebar-search-form pt-xs-30 pt-sm-30">
                            <form action="#">
                                <input type="text" class="li-search-field" name="key_word"
                                    placeholder="Tìm kiếm của bạn" value="{{ \Request::get('key_word')}}">
                                <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Loại sản phẩm: </h5>

                        <div class="categori-checkbox text-white">
                            <div class="custom-control custom-checkbox p-0">
                                <div class="categori-checkbox">

                                    <ul>

                                        @foreach($listCate as $lcate)

                                        <li><a href="?category_id={{$lcate->id}}">{{$lcate->cate_name}}</a></>
                                            @endforeach
</ul>
</div>

                                </div>






                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Giá sản phẩm</h5>
                            <div class="categori-checkbox">

                                <ul>
                                    <li><a href="?discout_price=1">Dưới 2 triệu</a></li>
                                    <li><a href="?discout_price=2">Từ 2 triệu đến 4 triệu</a></li>
                                    <li><a href="?discout_price=3">Từ 4 triệu đến 7 triệu</a></li>
                                    <li><a href="?discout_price=4">Từ 7 triệu đến 20 triệu</a></li>
                                    <li><a href="?discout_price=5">20 triệu trở lên</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Cửa hàng</h5>
                            <div class="size-checkbox">
                                <form action="#">
                                    <ul>
                                        @foreach ($listShop as $lshop)
                                        <li><input type="checkbox" name="product-size"><a
                                                href="#">{{$lshop->shop_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->

                    </div>
                    <!--sidebar-categores-box end  -->
                    <!-- category-sub-menu start -->

                </div>
                <div class="col-lg-9">
                    <!-- Begin Li's Banner Area -->

                    <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <div class="text-success">
                                        Số sản phẩm: <span>{{count($listProduces)}}</span>
                                    </div>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>

                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <form action="#" method="get" id="form_oder">
                                <div class="product-short">
                                    <p>Sắp xếp:</p>
                                    <select class="orderby" id="nice-select" name="orderby">
                                        <option value="md">--- Tất cả ---</option>
                                        <option value="desc">Sản phẩm mới nhất </option>
                                        <option value="asc">Sản phẩm cũ</option>
                                        <option value="price_max">Giá cao nhất</option>
                                        <option value="price_min">Giá thấp nhất</option>
                                    </select>
                                </div>
                            </form>

                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                        <!-- one product -->
                                        @foreach($listProduces as $lproduct)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{route('client.detail', ['id' => $lproduct->id])}}">
                                                    <img src="../upload/product/{{ $lproduct->url}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <!-- <span class="sticker">New</span> -->
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{route('client.detail')}}">ten shop</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="{{route('client.detail', ['id' => $lproduct->id])}}">{{$lproduct->name}}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        <span
                                                            class="new-price">{{number_format($lproduct->price)}}/{{$lproduct->unit}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions action__overplay">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart heart"><a class="links-details "
                                                                href="wishlist.html"><i class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li class="add-cart "><a href="#" title="quick view"
                                                                class="quick-view-btn" data-toggle="modal"
                                                                data-target="#exampleModalCenter"><i
                                                                    class="fa fa-eye"></i></a></li>

                                                        <li class="add-cart active ">
                                                            <a onclick="AddCart({{$lproduct->id}})"
                                                                href="javascript:"><i
                                                                    class="fa fa-cart-arrow-down fa-7x"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->

                                    </div>
                                    @endforeach
                                        <!-- end one product -->
                                    </div>
                                </div>
                            </div>

                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i>
                                                    Trước</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a href="#" class="Next"> Kế tiếp <i
                                                        class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->

    <!-- Begin Quick View | Modal Area -->
    @include('client.layouts.modal_show')
    <!-- Quick View | Modal Area End Here -->

    @endsection