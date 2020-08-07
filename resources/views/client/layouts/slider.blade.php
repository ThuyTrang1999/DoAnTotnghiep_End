 <!-- Begin Slider With Category Menu Area -->
 <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Category Menu Area -->
                        <div class="col-lg-3">
                            <!--Category Menu Start-->
                            <div class="category-menu category-menu-2">
                                <div class="category-heading">
                                    <h2 class="categories-toggle"><span>Loại sản phẩm</span></h2>
                                </div>
                                <div id="cate-toggle" class="category-menu-list">
                                    <ul>

                                        @foreach ($Category as $cate)
                                        <li class="right-menu"><a>{{ $cate -> cate_name}}</a>
                                            <ul class="cat-mega-menu">
                                                <li class="right-menu cat-mega-title">
                                                   <a href="#">Prime Video</a>
                                                    <ul>
                                                        <li><a href="#">All Videos</a></li>
                                                        <li><a href="#">Blouses</a></li>
                                                        <li><a href="#">Evening Dresses</a></li>
                                                        <li><a href="#">Summer Dresses</a></li>
                                                        <li><a href="#">T-shirts</a></li>
                                                        <li><a href="#">Rent or Buy</a></li>
                                                        <li><a href="#">Your Watchlist</a></li>
                                                        <li><a href="#">Watch Anywhere</a></li>
                                                        <li><a href="#">Getting Started</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                   <a href="shop-left-sidebar.html">Computers</a>
                                                    <ul>
                                                        <li><a href="#">More to Explore</a></li>
                                                        <li><a href="#">TV & Video</a></li>
                                                        <li><a href="#">Audio & Theater</a></li>
                                                        <li><a href="#">Camera, Photo</a></li>
                                                        <li><a href="#">Cell Phones</a></li>
                                                        <li><a href="#">Headphones</a></li>
                                                        <li><a href="#">Video Games</a></li>
                                                        <li><a href="#">Wireless Speakers</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                   <a href="shop-left-sidebar.html">Electronics</a>
                                                    <ul>
                                                        <li><a href="#">Amazon Home</a></li>
                                                        <li><a href="#">Kitchen & Dining</a></li>
                                                        <li><a href="#">Furniture</a></li>
                                                        <li><a href="#">Bed & Bath</a></li>
                                                        <li><a href="#">Appliances</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        @endforeach

                                        <li class="rx-child"><a href="#">Mobile & Tablets</a></li>
                                        <li class="rx-child"><a href="#">Accessories</a></li>
                                        <li class="rx-parent">
                                            <a class="rx-default">More Categories</a>
                                            <a class="rx-show">Less Categories</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Category Menu End-->
                        </div>
                        <!-- Category Menu Area End Here -->
                        <!-- Begin Slider Area -->
                        <div class="col-lg-6 col-md-8">
                            <div class="slider-area slider-area-3 pt-sm-30 pt-xs-30 pb-xs-30">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-7">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                            <h2>Chamcham Galaxy S9 | S9+</h2>
                                            <h3>Starting at <span>$589.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-02 bg-8">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                            <h2>Work Desk Surface Studio 2018</h2>
                                            <h3>Starting at <span>$1599.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-9">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                            <h2>Phantom 4 Pro+ Obsidian</h2>
                                            <h3>Starting at <span>$809.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-3 col-md-4 text-center pt-sm-30">
                            <div class="li-banner">
                                <a href="#">
                                    <img src="{{asset('assets/client/images/banner/3_1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="li-banner mt-15 mt-sm-30 mt-xs-25 mb-xs-5">
                                <a href="#">
                                    <img src="{{asset('assets/client/images/banner/3_2.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider With Category Menu Area End Here -->