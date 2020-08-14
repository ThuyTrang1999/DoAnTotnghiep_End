@extends('admin.layouts.master')

@section('title')
Danhn sách thông kê
@endsection

@section('main_content')
<h1>Danh sach thống ke</h1>

<div class="li-section-title mt-10">
    <h2>
        <span>Doanh Thu theo ngày tháng</span>
    </h2>
</div>
<form action="{{route('thongke.danhthu')}}">
    <div class="row">
        <div class="col-3">
            <input class="form-control" type="date" name="dayfrom">
        </div>
        <div class="col-3">
            <input class="form-control" type="date" name="dayto">
        </div>
        <div class="col-3">
            <button class="btn btn-primary">xem</button>
        </div>
    </div>
</form>
</br>
<div class="row">
    <div class="col-sm-12">
        <table id="datatable-responsive"
            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
            cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 81px;" aria-sort="ascending">
                        ID Hóa Đơn</th>

                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 176px;">
                        Tên Sản Phẩm</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 176px;">
                        Số Lượng </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 176px;">
                        Ngày </th>

                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                        style="width: 176px;">
                        Tổng </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($thongke as $tk)
                <tr role="row" class="odd">
                    <td>{{$tk->bill_id}}</td>
                    <td>{{$tk->name}}</td>
                    <td>{{$tk->tsl}}</td>
                    <td>{{$tk->created_at}}</td>
                    <td>{{$tk->tsl * $tk->price}} VNĐ</td>
                    <td style="display:none">{{ $tongtien +=$tk->tsl * $tk->price }}</td>
                    @endforeach
                </tr>

            </tbody>

        </table>
        <h3>Tổng Tiền : {{ $tongtien }} VNĐ</h3>
    </div>
</div>


@endsection