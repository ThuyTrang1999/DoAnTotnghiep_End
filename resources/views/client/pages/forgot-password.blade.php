<!doctype html>
<html class="no-js" lang="zxx">

<!-- login-register31:27-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/client/images/4.png')}}">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/material-design-iconic-font.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome.min.css') }}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ asset('assets/client/css/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css') }}"
        integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/meanmenu.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/owl.carousel.min.css') }}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/slick.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/jquery-ui.min.css') }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/venobox.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/nice-select.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/magnific-popup.css') }}">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/helper.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/responsive.css') }}">
    <!-- Modernizr js -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/custom.css') }}">
    <script src="{{ asset('assets/client/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">

        <!-- Begin Login Content Area -->
        <div class="page-section page-section-login">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                        <div class="logo_bit text-center">
                            <img src="assets/client/images/menu/logo/3tm_shop.png" alt="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 ">
                        <!-- Login Form s-->

                        <form action="{{route('verify-email')}}" method="POST">
                            @csrf
                            <div class="login-form">
                                <h4 class="login-title">Quên mật khẩu</h4>

                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label for="email"><i class="fa fa-envelope"></i> email</label>
                                        <input class="mb-0 form-control" id="email" type="email" placeholder="email"
                                            name="email" value="{{old('email')}}">
                                        @error('email')
                                        <p class="text-danger ">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <!-- <p class="help is-danger">{{ $errors->first('email') }}</p> -->
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                        <a href="{{route('dang-nhap')}}">Đăng nhập</a>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="form-control register-button mt-0 ">Reset password</button>

                                    </div>

                                    @if (session()->has('thongbao'))
                                        <div class="col-md-12">
                                            <div class="alert alert-success">
                                                {{session()->get('thongbao')}}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                              
                                <!-- Button trigger modal -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="assets/client/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/client/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="assets/client/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="assets/client/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="assets/client/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="assets/client/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="assets/client/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="assets/client/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="assets/client/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="assets/client/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="assets/client/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="assets/client/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="assets/client/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="assets/client/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="assets/client/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="assets/client/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="assets/client/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="assets/client/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="assets/client/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="assets/client/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="assets/client/js/main.js"></script>
</body>

<!-- login-register31:27-->

</html>