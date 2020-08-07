
<div class="header-middle-right">
    <ul class="hm-menu">
        <!-- Begin Header Mini Cart Area -->
        <li class="hm-minicart">
            <div class="hm-minicart-trigger">
            @if(Session::has("Cart") != null)
                <span class="item-icon"></span>
                <span class="item-text">{{Session::get("Cart")->TongTien}}
                    <span class="cart-item-count">{{number_format(Session::get("Cart")->TongSL)}}</span>
                </span>
                @else
                <span class="item-icon"></span>
                <span class="item-text">0  vnđ
                    <span class="cart-item-count">0</span>
                </span>
                @endif
            </div>
            <span></span>

            <div class="minicart">
                <ul class="minicart-product-list">
                    @if(Session::has("Cart") != null)
                    @foreach(Session::get("Cart")->sanpham as $item)
                    <li>
                        <a href="single-product.html" class="minicart-product-image">
                            <img src="../upload/product/{{$item['ttsanpham']->url}}" alt="cart products">
                        </a>
                        <div class="minicart-product-details">
                            <h6><a href="single-product.html">{{$item['ttsanpham']->name}}</a></h6>
                            <span>{{$item['ttsanpham']->price}} x {{$item['quanty']}}</span>
                        </div>
                        <button class="close" title="Remove">
                            <i class="fa fa-close"></i>
                        </button>
                    </li>
                    @endforeach
                    @endif
                </ul>
                @if(Session::has("Cart") != null)
                <p class="minicart-total">Tổng tiền: <span>{{Session::get("Cart")->TongTien}} vnđ</span></p>
                @endif
                <div class="minicart-button">
                    <a href="{{route('show_cart')}}" class="li-button li-button-fullwidth li-button-dark">
                        <span>Xem giỏ hàng</span>
                    </a>
                    <a href="{{route('checkout')}}" class="li-button li-button-fullwidth li-button-dark ">
                                                        <span>Thanh toán</span>
                                                    </a>

                </div>
            </div>

        </li>
        <!-- Header Mini Cart Area End Here -->
    </ul>
</div>

