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
                             <li style="cursor: pointer;"><a href="#{{$cate->alilas}}">{{ $cate -> cate_name}}</a></li>
                             @endforeach

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
            
                 @foreach ($new_Data as $data)
                 <div class="li-banner">
                     <a href="{{route('news')}}">
                         <img src="../upload/post/{{$data->Hinh}}" alt="">
                     </a>
                 </div>
                 
                 @endforeach
             </div>
             <!-- Li Banner Area End Here -->
         </div>
     </div>
 </div>
 <!-- Slider With Category Menu Area End Here -->