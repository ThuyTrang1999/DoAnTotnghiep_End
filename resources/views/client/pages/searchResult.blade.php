@extends('client.layouts.master')

@section('title')
Kết quả tìm kiếm
@endsection


@section('content')

<div class="content-wraper pb-60">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-12">
            <div class="li-section-title">
                    <h2>
                        <span>KẾT QUẢ TÌM KIẾM</span>
                    </h2>
                    
                </div>
                <div class="product-short text-success">
                        
                <span>Tìm thấy:&nbsp;{{count($listSearchResult)}}&nbsp;sản phẩm</span>
                       
                    </div>
                <!-- shop-top-bar start -->
                
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    <!-- one product -->
                                    @foreach($listSearchResult as $searchResult)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{route('client.detail', ['id' => $searchResult->id])}}">
                                                    <img src="../upload/product/{{ $searchResult->url}}"
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
                                                            href="{{route('client.detail', ['id' => $searchResult->id])}}">{{$searchResult->name}}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{$searchResult->price}}</span>
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
                                                            <a onclick="AddCart({{$searchResult->id}})" href="javascript:"><i
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
                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Trước</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a href="#" class="Next"> Kế tiếp <i class="fa fa-chevron-right"></i></a>
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

@endsection