@extends('admin.layouts.master')

@section('title')
Danh sách bill
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách Hóa Đơn</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">

                                <form action="{{route('brand.listBrand')}}" method="get" role="search">
                                    <div class="col-sm-3">
                                        <input name="search" id="search" type="text" class="form-control input-sm"
                                            placeholder="Search ..." aria-controls="datatable-responsive"
                                            value="{{ \Request::get('search')}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="sumit" class="btn btn-primary">Search<i class="fa fa-search"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </form>
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
                                                        Id</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Tên Khách</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Cửa hàng
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Phương
                                                        thức thanh toán
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng
                                                        thái
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Tổng tiền
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Ngày
                                                    </th>
                                                    <th tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                                        colspan="1" style="width: 81px;" aria-sort="ascending">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listBill as $Bill)
                                                <tr role="row" class="odd">
                                                    <td>{{$Bill -> id}}</td>
                                                    <td>{{$Bill -> name}}</td>
                                                    <td>{{$Bill -> shop_name}}</td>
                                                    <td>{{$Bill -> payment}}</td>
                                                    @if($Bill ->st == 2)
                                                    <td class="text-primary"> Đã duyệt</td>
                                                    @elseif($Bill ->st == 3)
                                                    <td class="text-warning"> Đang vận chuyển</td>
                                                    @elseif($Bill ->st == 4)
                                                    <td class="text-success"> Đã Thanh Toán</td>
                                                    @else
                                                    <td class="text-danger">Hủy Hóa Đơn</td>
                                                    @endif

                                                    <td>{{$Bill -> total}}</td>
                                                    <td>{{$Bill -> created_at}}</td>
                                                    <td><a href="{{route('bill.cap-nhat',['id'=>$Bill->id])}}"
                                                            class="btn btn-warning"><i class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection