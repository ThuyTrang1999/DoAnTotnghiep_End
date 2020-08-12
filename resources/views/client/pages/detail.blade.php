@extends('client.layouts.master')

@section('title')
Trang chi tiet
@endsection


@section('content')

<!-- chi tiet -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        @if(isset($singleProduct))
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->

                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg')}}"
                                data-gall="myGallery">
                                <img src="../upload/product/{{ $singleProduct->url }}" alt="product image"
                                    style="{{$singleProduct->style}}">
                            </a>
                        </div>
                        @foreach($imgDetail as $img_detail)
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/2.jpg')}}"
                                data-gall="myGallery">
                                <img src="../upload/product/{{$img_detail->url }}" alt="product image">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1 mt-60">
                        <div class="sm-image"><img src="../upload/product/{{$singleProduct->url}}"
                                alt="product image thumb">
                        </div>
                        @foreach($imgDetail as $img_detail)
                        <div class="sm-image"><img src="../upload/product/{{$img_detail->url}}"
                                alt="product image thumb">
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">

                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{$singleProduct->name}}</h2>
                        <!-- <span class="product-details-ref">Ten shop</span> -->
                        <div class="rating-box pt-20 ">
                            <ul class="rating rating-with-review-item">
                                @php
                                $avgRating = ceil($singleProduct->comments->avg('rate'));
                                @endphp
                                @for ($i = 1; $i <= $avgRating; $i++) <li><i class="fa fa-star"></i></li>
                                    @endfor
                                    @for ($i = 1; $i <= 5 - $avgRating; $i++) <li class="no-star 5x"><i
                                            class="fa fa-star"></i></li>
                                        @endfor


                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">{{number_format($singleProduct->price)}} VNĐ
                                /{{$singleProduct->unit}}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>{{$singleProduct->desc}}</span>
                            </p>
                        </div>

                        <div class="single-add-to-cart">
                            <form action="{{route('add_cart', ['id' => $singleProduct->id])}}" class="cart-quantity">
                                <div class="quantity">
                                    <label>Số lượng</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">MUA NGAY</button>
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <a class="wishlist-btn" href="{{route('wishlist', ['id' => $singleProduct->id])}}"><i class="fa fa-heart-o"></i>Thêm vào danh sách
                                yêu thích</a>
                            <div class="product-social-sharing pt-25">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a>
                                    </li>
                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#product-details"><span>Chi tiết sản phẩm</span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            
            <div id="product-details" class="tab-pane active show" role="tabpanel">
                <div class="product-details-manufacturer">
                    <span>{{$singleProduct->desc}}</span>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review li-comment-section" id="comment-review">
                            <ul>
                                @foreach ($singleProduct->comments as $comment)
                               
                                <li class="comment-children">
                                    <div class="author-avatar pt-15">
                                        <img src="../../upload/avatar/icon_md.png" alt="Admin" style="width: 50px">
                                    </div>
                                    <div class="comment-body pl-15">
                                    <div style="width: 100%;" class="text-warning">
                                        @for ($i = 1; $i <= $comment->rate; $i++)
                                            <i class="fa fa-star"></i>
                                            @endfor
                                            @for ($i = 1; $i <= 5 - $comment->rate; $i++)
                                                <i class="fa fa-star-o no-star"></i>
                                                @endfor
                                    </div>
                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">Đáp lại</a></span>
                                        <h5 class="comment-author pt-15">{{$comment->customer->name}}</h5>
                                        <div class="comment-post-date">
                                            {{$comment->created_at}}
                                        </div>
                                        <p>{{$comment->content}}</p>
                                       
                                    </div>
                                    
                                </li>

                                @endforeach
                            </ul>
                        </div>

                        <div class="review-btn">
                            @if (Auth::guard('customer')->check())
                            <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết đánh
                                giá</a>
                            @else
                            Vui lòng <a href="{{route('dang-nhap-client')}}">đăng nhập</a> để viết đánh giá.
                            @endif
                        </div>
                        <!-- Begin Quick View | Modal Area -->
                        @if (Auth::guard('customer')->check())

                        <div class="modal fade modal-wrapper" role="dialog" id="mymodal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                    @if(isset($singleProduct))
                                        <h3 class="review-page-title">Đánh giá của bạn</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-6">
                                                <div class="li-review-product">
                                                    <img src="../upload/product/{{ $singleProduct->url }}"
                                                        alt="Li's Product">
                                                    <div class="li-review-product-desc">
                                                        <p class="li-product-name">{{$singleProduct->name}}</p>
                                                        <p>
                                                            <span>{{$singleProduct->desc}} </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="li-review-content">
                                                    <!-- Begin Feedback Area -->
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <form action="{{route('client.rating')}}" method="post"
                                                                id="rating-form">
                                                                <input type="hidden" name="product_id"
                                                                    value="{{$singleProduct->id}}">
                                                                <p class="your-opinion">
                                                                    <label>Số sao<span
                                                                            class="required">*</span></label>
                                                                    <span>
                                                                        <select class="star-rating" name="rate"
                                                                            required>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </span>
                                                                </p>
                                                                <p class="feedback-form">
                                                                    <label for="feedback">Đánh giá của bạn<span
                                                                            class="required">*</span></label>
                                                                    <textarea id="feedback" name="content" cols="45"
                                                                        rows="8" aria-required="true"
                                                                        required></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal"
                                                                            aria-label="Close">Hủy</a>
                                                                        <button type="submit">
                                                                            Đánh giá
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Feedback Area End Here -->
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Quick View | Modal Area End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Sản phẩm cùng loại</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active related owl-carousel">
                        @foreach ($related_product as $reProduct)
                        <div class="col-lg-12 ">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap wow fadeInLeft single_overplay" data-wow-duration="2s">
                                <div class="product-image">
                                    <a href="{{route('client.detail',['id'=>$reProduct->id])}}">
                                        <img src="../upload/product/{{$reProduct->url}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="{{route('client.detail')}}">{{$reProduct->shop_name}}</a>
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
                                                href="{{route('client.detail')}}">{{$reProduct->name}}</a>
                                        </h4>
                                        <div class="price-box">
                                            <span
                                                class="new-price">{{number_format($reProduct->discout_price)}}/{{$reProduct->unit}}</span>
                                            <span
                                                class="old-price">{{number_format($reProduct->price)}}/{{$reProduct->unit}}</span>
                                            <!-- <span class="discount-percentage">-7%</span> -->
                                        </div>

                                    </div>
                                    <div class="add-actions action__overplay">
                                        <ul class="add-actions-link">
                                            <li class="add-cart heart"><a class="links-details " href="{{route('wishlist', ['id' => $reProduct->id])}}"><i
                                                        class="fa fa-heart"></i></a>
                                            </li>
                                            <li class="add-cart "><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>

                                            <li class="add-cart active "><a onclick="AddCart({{$reProduct->id}})"
                                                    href="javascript: "><i class="fa fa-cart-arrow-down fa-7x"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap wow fadeInLeft end -->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
</section>
<!-- Li's Laptop Product Area End Here -->

@endsection

@section('scripts')
<script type='text/javascript'>
$(document).ready(function() {
    // function btnLoading(btnSelector, loading = true) {
    //     const loadingHtml = '<i class="fa fa-spin fa-spinner mr-1"></i>';
    //     btnSelector.prop('disabled', loading);
    //     if (!loading) {
    //         btnSelector.html('Submit');
    //     } else {
    //         btnSelector.html(loadingHtml);
    //     }
    // }

    $("#rating-form").submit(function(e) {
        e.preventDefault(); //loại bỏ tất cả những cái skien mặc định

        const form = $(this);

        const action = form.attr('action'); // Attr: lấy giá trị của attribute
        const method = form.attr('method');
        const data = form.serialize(); // Lấy tất cả giá trị form
        // product_id=8&content=dsdsa
        // form.serializeArray()

        const btnSubmit = form.find('button:submit');

        $.ajax({
                url: action,
                method: method,
                data: data,
                beforeSend: function() {
                    // Chạy trước khi ajax gửi lên server
                    // btnLoading(btnSubmit);
                },
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                },
                // success: function() {

                // },
                // error: function () {

                // }
            })
            .done(function(result) {
                const data = result.data;

                let html = `
                        <li style="list-style: decimal;">
                            User: ${data.customer.name} <br />
                            
                            Content: ${data.content} <br />
                            Rate:
                            <ul class="rating">`;
                for (let i = 1; i <= data.rate; i++) {
                    html += '<li><i class="fa fa-star"></i></li>';
                }
                for (let i = 1; i <= 5 - data.rate; i++) {
                    html += '<li class="no-star"><i class="fa fa-star-o"></i></li>';
                }
                html += `</ul>
                        </li>
                    `;

                $("#comment-review ol").prepend(
                    html); //có tdung them nội dung vao đầu selector nào đó
                // Ngược với hàm prepend: append()
                $("html, body").animate({
                    scrollTop: $("#comment-review").offset().top -
                        80 // Tính khoảng cách từ selector #comment-review so với đầu browser
                }, 500); // Cuộn trang => Tham khảo keyword: jquery animation

                form[0].reset(); // Reset form
                form.find('.close')[0].click(); // Click vào selector .close
            })
            .fail(function(err) {
                console.log(err);

                // alert(err.responseJSON.message);
            })
            .always(function() {
                // Xử lý khi ajax chạy xong
                // btnLoading(btnSubmit, false);
            });

        // return false;
    });
});
</script>
@endsection