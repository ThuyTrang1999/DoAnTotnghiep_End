@extends('admin.layouts.master')

@section('title')
Danh sách người dùng
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách người dùng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}       
                </div>
            @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <a href="{{route('user.them-moi')}}" class="btn bg_btnAdd">Thêm người dùng &nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                                <form action="{{route('user.listUser')}}" method="get" role="search"> 
                                    <div class="col-sm-3">
                                    <input name="search" id="search" type="text" class="form-control input-sm" placeholder="Tìm kiếm"
                                    aria-controls="datatable-responsive" value="{{ \Request::get('search')}}">
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" name="role" id="role">   
                                        <option value="">Chọn quyền</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Chủ shop</option>
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
                                    <button type="sumit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
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
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Tài khoản
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">Họ
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">Tên
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 74px;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Hình ảnh</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 60px;"
                                                        aria-label="Salary: activate to sort column ascending">Email
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 43px;"
                                                        aria-label="Extn.: activate to sort column ascending">Điện thoại</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Địa chỉ
                                                    </th>
                                                   
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Giới tính
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Ngày sinh
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;">Quyền
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng thái
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Ngày tạo
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Ngày cập nhật
                                                    </th>
                                                    <th  tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listUsers as $ur)
                                                <tr class="odd cus-{{$ur -> id}}">
                                                    <td>{{$ur -> user_name}}</td>
                                                    <td>{{$ur -> last_name}}</td>
                                                    <td>{{$ur -> first_name}}</td>
                                                    <td class="text-center">
                                                        <img src="upload/avatar/{{$ur->avatar}}" alt=""
                                                            style="height: 50px; width: 100px;">
                                                    </td>
                                                    <td>{{$ur -> email}}</td>
                                                    <td>{{$ur -> phone}}</td>
                                                    <td>{{$ur -> address}}</td>
                                                    @if($ur->gender==1)
                                                    <td>Nam</td>
                                                    @else
                                                    <td>Nữ</td>
                                                    @endif
                                                    <td>{{$ur -> birthday}}</td>
                                                    @if($ur->role==1)
                                                    <td>Quản trị viên</td>
                                                    @else
                                                    <td>Chủ shop</td>
                                                    @endif
                                                    @if($ur->status==1)
                                                    <td class="text-success">Đang hoạt động</td>
                                                    @else($ur->status==2)
                                                    <td class="text-danger">Không hoạt động</td>
                                                    @endif
                                                    <td>{{$ur -> created_at}}</td>
                                                    <td>{{$ur -> updated_at}}</td>
                                                    <td class="text-center">
                                                        <a href="{{route('user.cap-nhat',['id'=>$ur->id])}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="{{route('user.xoa',['id'=>$ur->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa???')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @csrf
                                               
                                            </tbody>
                                        </table>
                                        {!! $listUsers->links() !!}
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

@section('js')

@endsection