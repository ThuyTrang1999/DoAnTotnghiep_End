    <!-- Modernizr js -->
    <script src="{{ asset('assets/client/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- jQuery-V1.12.4 -->
    <script src="{{asset('assets/client/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('assets/client/js/vendor/popper.min.js')}}"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
    <!-- Ajax Mail js -->
    <script src="{{asset('assets/client/js/ajax-mail.js')}}"></script>
    <!-- Meanmenu js -->
    <script src="{{asset('assets/client/js/jquery.meanmenu.min.js')}}"></script>
    <!-- Wow.min js -->
    <script src="{{asset('assets/client/js/wow.min.js')}}"></script>
    <!-- Slick Carousel js -->
    <script src="{{asset('assets/client/js/slick.min.js')}}"></script>
    <!-- Owl Carousel-2 js -->
    <script src="{{asset('assets/client/js/owl.carousel.min.js')}}"></script>
    <!-- Magnific popup js -->
    <script src="{{asset('assets/client/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Isotope js -->
    <script src="{{asset('assets/client/js/isotope.pkgd.min.js')}}"></script>
    <!-- Imagesloaded js -->
    <script src="{{asset('assets/client/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- Mixitup js -->
    <script src="{{asset('assets/client/js/jquery.mixitup.min.js')}}"></script>
    <!-- Countdown -->
    <script src="{{asset('assets/client/js/jquery.countdown.min.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('assets/client/js/jquery.counterup.min.js')}}"></script>
    <!-- Waypoints -->
    <script src="{{asset('assets/client/js/waypoints.min.js')}}"></script>
    <!-- Barrating -->
    <script src="{{asset('assets/client/js/jquery.barrating.min.js')}}"></script>
    <!-- Jquery-ui -->
    <script src="{{asset('assets/client/js/jquery-ui.min.js')}}"></script>
    <!-- Venobox -->
    <script src="{{asset('assets/client/js/venobox.min.js')}}"></script>
    <!-- Nice Select js -->
    <script src="{{asset('assets/client/js/jquery.nice-select.min.js')}}"></script>
    <!-- ScrollUp js -->
    <script src="{{asset('assets/client/js/scrollUp.min.js')}}"></script>
    <!-- Main/Activator js -->
    <script src="{{asset('assets/client/js/main.js')}}"></script>
    <script src=”https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js”></script>
    <script>
new WOW().init();
    </script>
    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
function AddCart(id) {
    // console.log(id);
    $.ajax({
        url: "them-san-pham/" + id,
        type: 'GET',
    }).done(function(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        alertify.success('Thêm Sản Phẩm Thành Công');

    });
}

// $(document).ready(function() {
//     $('.quanty').blur(function() {
//         let rowId = $(this).data('id');
//         $.ajax({
//             url: "cap-nhat-san-pham/" + rowId,
//             type: 'GET',
//             dataType: 'json',
//             data: {
//                 quanty: $(this).val(),
//             }
//             success: function(data){
//                 console.log(data);
//             }
//         });
//     });
// });

// function DeleteCart(id) 
// {
//     // console.log(id);
//     $.ajax({
//         url: "xoa-san-pham/" + id,
//         type: 'GET',
//     }).done(function(response) {
//         $("#change-item-cart").empty();
//         $("#change-item-cart").html(response);
//         alertify.success('Xoá Sản Phẩm Thành Công');

//     });
// }
    </script>


    <script>
        $(function (){
            $('.orderby').change(function(){
                $("#form_oder").submit();
            })
        })
    </script>
