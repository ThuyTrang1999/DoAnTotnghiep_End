<div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Header Bottom Menu Area -->
                <div class="hb-menu">
                    <nav>
                        <ul>
                            <li class="dropdown-holder home"><a href="{{ route('client.index')}}">Trang chủ</a></li>


                            <li class="megamenu-holder"><a href="#">cửa hàng</a>
                                <ul class="megamenu hb-megamenu">
                                    <li><a href="shop-left-sidebar.html">Cửa hàng</a>
                                        <ul>
                                        @foreach($showShop as $shop)
                                            <li><a href="#">{{$shop->shop_name}}</a></li>
                                        @endforeach
                                        </ul>
                                    </li>


                                </ul>
                            </li>


                            <li class="dropdown-holder"><a href="#">Sản phẩm</a>
                                <ul class="hb-dropdown">
                                    <li><a href="{{ route('client.list-product')}}">Tất cả sản phẩm</a></li>
                                   
                                    <li class="sub-dropdown-holder"><a href="#">Laptop</a>
                                        <ul class="hb-dropdown hb-sub-dropdown">
                                            <li><a href="blog-2-column.html"></a></li>
                                            <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                            <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                  


                                </ul>
                            </li>
                            
                            <li class="about"><a href="{{ route('about')}}">Giới thiệu</a></li>
                            <li><a href="{{ route('contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Header Bottom Menu Area End Here -->
            </div>
        </div>
    </div>
</div>