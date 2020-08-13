@extends('admin.layouts.master')

@section('title')
list custommer
@endsection

@section('main_content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách khách hàng</h2>
                <div class="clearfix"></div>
                <form action="{{route('customer.listCustomer')}}" method="get" role="search">
                    <div class="col-sm-3">
                        <input name="search" id="search" type="text" class="form-control input-sm"
                            placeholder="Tìm kiếm" aria-controls="datatable-responsive"
                            value="{{ \Request::get('search')}}">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="role" id="role">
                            <option value="">Chọn quyền</option>
                            <option value="2">Khách</option>
                            <option value="1">Chủ shop</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="status" id="status">
                            <option value="">Trạng thái</option>
                            <option value="1">Đang hoạt động</option>
                            <option value="2">Không hoạt động</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="sumit" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Tên</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;">Hình ảnh
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;">Giới tính
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">Dịa chỉ
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 74px;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Điện thoại</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 60px;"
                                                        aria-label="Salary: activate to sort column ascending">Gmail
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 43px;"
                                                        aria-label="Extn.: activate to sort column ascending">Quyền</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 43px;"
                                                        aria-label="Extn.: activate to sort column ascending">Trạng thái
                                                    </th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Ngày tạo
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Cập nhật
                                                    </th>
                                                    <th tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                                        colspan="1" style="width: 81px;" aria-sort="ascending">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listCustomer as $cus)
                                                <tr class="odd cus-{{$cus -> id}}">
                                                    <td>{{$cus -> name}}</td>
                                                    <td class="text-center">
                                                        <img src="upload/avatar/{{$cus->avatar}}" alt=""
                                                            style="height: 50px; width: 100px;">
                                                    </td>
                                                    <td>{{$cus -> gender}}</td>
                                                    <td>{{$cus -> address}}</td>
                                                    <td>{{$cus -> phone}}</td>
                                                    <td>{{$cus -> email}}</td>
                                                    @if($cus->role==1)
                                                    <td>Chủ shop</td>
                                                    @else
                                                    <td>Khách</td>
                                                    @endif
                                                    @if($cus->status==1)
                                                    <td>Hoạt động</td>
                                                    @else
                                                    <td>Không hoạt động</td>
                                                    @endif
                                                    <td>{{$cus -> created_at}}</td>
                                                    <td>{{$cus -> updated_at}}</td>
                                                    <td class="text-center">

                                                        <a href="{{route('customer.cap-nhat',['id'=>$cus->id])}}"
                                                            class="btn btn-warning"><i class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></a>
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {!! $listCustomer->links() !!}
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
</div>

@endsection