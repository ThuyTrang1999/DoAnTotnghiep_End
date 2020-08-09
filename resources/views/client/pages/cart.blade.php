@extends('client.layouts.master')

@section('title')
Trang giỏ hàng
@endsection


@section('content')

<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(Session::has("Cart") != null)
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-quantity">Số lượng</th>
                                    <th class="li-product-subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach(Session::get("Cart")->sanpham as $item)
                                <tr id="change-item-cart">
                                    <td class="li-product-remove"><a onclick="DeleteCart({{$item['ttsanpham']->id}})" href="javascript: "><i
                                                class="fa fa-trash text-danger"></i></a></td>
                                    <td class="li-product-thumbnail"><a><img
                                                src="../upload/product/{{$item['ttsanpham']->url}}"
                                                alt="Li's Product Image"></a></td>
                                    <td class="li-product-name"><a>{{$item['ttsanpham']->name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($item['ttsanpham']->price)}}
                                            vnđ</span></td>
                                    <td class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box quanty" name="quanty" value="{{$item['quanty']}}"
                                                type="number"  onchange="updateCart(this.value,'{{$item['ttsanpham']->id}}')">
                                            <div class="dec qtybutton" >
                                                <a onclick="DecNumberCart({{$item['ttsanpham']->id}})" href="javascript: "><i class="fa fa-angle-down"></i></a></div>
                                            <div class="inc qtybutton">
                                                <a ><i class="fa fa-angle-up"></i></a></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format( $item['price'])}} vnđ</span></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">

                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Cập nhật giỏ hàng" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng số giỏ hàng</h2>
                                <ul>
                                    <li>Số lượng sản phẩm<span>{{Session::get("Cart")->TongSL}}</span></li>
                                    <li>Tổng tiền <span>{{number_format(Session::get("Cart")->TongTien)}} VND</span></li>
                                </ul>
                                <a href="{{route('checkout')}}">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->

@endsection