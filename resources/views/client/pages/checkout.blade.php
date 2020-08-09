@extends('client.layouts.master')

@section('title')
Thanh toán
@endsection


@section('content')
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">

                    <!--Accordion Start-->
                    <h3>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Có phiếu giảm giá? </font>
                        </font><span id="showcoupon">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nhấn vào đây để nhập mã của bạn</font>
                            </font>
                        </span>
                    </h3>
                    <div id="checkout_coupon" class="coupon-checkout-content" style="display: none;">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input placeholder="Mã giảm giá" type="text">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"><input value="Áp dụng phiếu giảm giá"
                                                type="submit"></font>
                                    </font>
                                </p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                </div>
            </div>
        </div>

        <form action="{{route('save_checkout_custommer')}}" method="POST">
            {{csrf_field()}}

            <div class="row">
                <div class="col-lg-6 col-12">
                    @if (Auth::guard('customer')->check())
                    <div class="checkbox-form">
                        <h3>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Chi tiết thanh toán</font>
                            </font>
                        </h3>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Tên Khách Hàng </font>
                                        </font><span class="required">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">*</font>
                                            </font>
                                        </span>
                                    </label>
                                    <input placeholder="Nhập hộ tên đầy đủ" 
                                        value="{{ Auth::guard('customer')->user()->name }}" 
                                        name="cus_name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Giới tính</font>
                                        </font><span class="required">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">*</font>
                                            </font>
                                        </span>
                                    </label>
                                    <select name="cus_gender" id="gender" style="border: 1px solid #eee;"
                                        @if(isset($infoCustommer)) value="{{$infoCustommer->gender}}" @endif>
                                        @foreach($dataUser as $data)
                                        <option @if(isset($infoCustommer)) @if($data->gender == $infoCustommer->gender)
                                            selected
                                            @endif value="{{$data->gender}}">{{ $data->gender}}
                                        </option>
                                        @endif value="{{$data->gender}}">{{ $data->gender}}
                                        @endforeach
                                    </select>



                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Số điện thoại</font>
                                        </font>
                                    </label>
                                    <input placeholder="Số điện thoại" 
                                        value="{{ Auth::guard('customer')->user()->phone}}" name="cus_phone" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Địa chỉ email </font>
                                        </font><span class="required">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">*</font>
                                            </font>
                                        </span>
                                    </label>
                                    <input placeholder="Email" 
                                        value="{{ Auth::guard('customer')->user()->email}}" name="cus_email" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Địa chỉ </font>
                                        </font><span class="required">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">*</font>
                                            </font>
                                        </span>
                                    </label>
                                    <input placeholder="Địa chỉ"
                                        value="{{ Auth::guard('customer')->user()->address }}" name="cus_address" type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Tạo một tài khoản?</font>
                                        </font>
                                    </label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Tạo một tài khoản bằng cách nhập
                                                thông tin dưới đây. </font>
                                            <font style="vertical-align: inherit;">Nếu bạn là khách hàng cũ, vui lòng
                                                đăng nhập ở đầu trang.</font>
                                        </font>
                                    </p>
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Mật khẩu tài khoản </font>
                                        </font><span class="required">*</span>
                                    </label>
                                    <input placeholder="mật khẩu" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="different-address">

                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Ghi chú đặt hàng</font>
                                        </font>
                                    </label>
                                    <textarea id="checkout-mess" name="note" cols="30" rows="10"
                                        placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ ghi chú đặc biệt để giao hàng."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Đơn hàng của bạn</font>
                            </font>
                        </h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Sản phẩm</font>
                                            </font>
                                        </th>
                                        <th class="cart-product-total">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Số lượng</font>
                                            </font>
                                        </th>
                                        <th class="cart-product-total">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Thành tiền</font>
                                            </font>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(Session::has("Cart") != null)
                                    @foreach(Session::get("Cart")->sanpham as $item)
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-left">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{$item['ttsanpham']->name}}
                                                </font>
                                            </font>
                                        </td>
                                        <td class="cart-product-name">
                                            <strong class="product-quantity">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">{{$item['quanty']}}</font>
                                                </font>
                                            </strong>
                                        </td>

                                        <td class="cart-product-total"><span
                                                class="amount">{{number_format($item['price'])}}
                                                vnđ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if(Session::has("Cart") != null)
                                    <tr class="cart-subtotal">
                                        <th>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;float:left !important;">Tổng phụ
                                                    thu</font>
                                            </font>
                                        </th>
                                        <td></td>
                                        <td><span class="amount">0</span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>

                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit; ">Tổng tiền đơn hàng</font>
                                            </font>
                                        </th>
                                        <td></td>
                                        <td>
                                            <strong>
                                                <span class="amount">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            {{number_format(Session::get("Cart")->TongTien)}}
                                                            VNĐ</font>
                                                    </font>
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <!-- <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            Chuyển tiền trực tiếp qua ngân hàng.
                                                        </font>
                                                    </font>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Thanh toán trực tiếp vào
                                                            tài
                                                            khoản ngân hàng của chúng tôi. </font>
                                                        <font style="vertical-align: inherit;">Vui lòng sử dụng ID đơn
                                                            hàng
                                                            của bạn làm tài liệu tham khảo thanh toán. </font>
                                                        <font style="vertical-align: inherit;">Đơn hàng của bạn sẽ không
                                                            được giao cho đến khi tiền được xóa trong tài khoản của
                                                            chúng
                                                            tôi.</font>
                                                    </font>
                                                </p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            Thanh toán séc
                                                        </font>
                                                    </font>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your
                                                    Order
                                                    ID as the payment reference. Your order won’t be shipped until the
                                                    funds
                                                    have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            PayPal
                                                        </font>
                                                    </font>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your
                                                    Order
                                                    ID as the payment reference. Your order won’t be shipped until the
                                                    funds
                                                    have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="order-button-payment">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            <input value="Đặt hàng" type="submit">
                                        </font>
                                    </font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>

@endsection