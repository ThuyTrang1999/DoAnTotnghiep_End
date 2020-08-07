@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')

    <div class="li-section-title mt-10">
        <h2>
            <span>Thống kê cửa hàng</span>
        </h2>
    </div>
   
    <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Tên sản phẩm</th>
                                                   
                                                        <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        số lượng </th>
                                                        <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Tổng </th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sanpham as $sp)
                                                <tr role="row" class="odd">
                                                    <td></td>
                                                    <td>{{$sp->tsl}}</td>
                                                    <td>{{$sp->tsl * 50000}}</td>
                                                    @endforeach
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="li-section-title mt-10">
        <h2>
            <span>Doanh Thu theo ngày tháng</span>
        </h2>
    </div>
       
    <div class="row">
        <div class="col-3">
    <input class="form-control" type="date"> 
        </div>
        <div class="col-3">
    <input class="form-control" type="date"> 
        </div>
        <div class="col-3">
    <button class="btn btn-primary">xem</button> 
        </div>
    </div>
    </br>    
    <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Tên sản phẩm</th>
                                                   
                                                        <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        số lượng </th>
                                                        <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Tổng </th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sanpham as $sp)
                                                <tr role="row" class="odd">
                                                    <td></td>
                                                    <td>{{$sp->tsl}}</td>
                                                    <td>{{$sp->tsl * 50000}}</td>
                                                    @endforeach
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    

    
@endsection