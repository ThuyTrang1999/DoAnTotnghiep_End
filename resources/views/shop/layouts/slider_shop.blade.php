<div class="slider-with-banner mb-20">
    <div class="container">
    @if(isset($showVendor))
        <div class="row">
            <!-- Begin Category Menu Area -->
            <div class="col-lg-4">
                <div class="logo_shop">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="shop_logo">
                                <a href="#">
                                    <img src="../upload/logo/{{ $showVendor->logo }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="shop_name">
                                <h2 class="text-white">{{$showVendor->shop_name}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category Menu Area End Here -->
            <!-- Begin Slider Area -->
            <div class="col-lg-8">
            @if(isset($listProduces))
               <div>
                 <h4><i class="fa fa-pie-chart" aria-hidden="true"></i> Sản phẩm: <span>{{Count($listProduces)}}</span></h4>
               </div>
               <div>
                 <h4><i class="fa fa-star-half-o" aria-hidden="true"></i> Đánh giá: <span></span></h4>
               </div>
               @endif
            </div>
            <!-- Slider Area End Here -->
        </div>
        @endif
    </div>
</div>


<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner shop_carosel">
            <div class="carousel-item active">
                <img src="{{asset('upload/banner/banner1.png')}}" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="{{asset('upload/banner/banner2.jpg')}}" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="{{asset('upload/banner/banner3.jpg')}}" class="d-block w-100" alt="...">

            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>