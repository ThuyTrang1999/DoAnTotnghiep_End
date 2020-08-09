@extends('admin.layouts.master')

@section('title')
list shop
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Danh sách cửa hàng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('vendor.them-moi-vendor')}}" class="btn bg_btnAdd">Thêm mới
                                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <form action="{{route('vendor.listVendor')}}" method="get" role="search"> 
                                    <div class="col-sm-3">
                                    <input name="search" id="search" type="text" class="form-control input-sm" placeholder="Search ..."
                                    aria-controls="datatable-responsive" value="{{ \Request::get('search')}}">
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
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Chủ cửa hàng</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Tên cửa hàng</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 74px;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Logo</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">Mô tả
                                                    </th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Banner</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng
                                                        thái
                                                    </th>
                                                    <th tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                                        colspan="1" style="width: 81px;" aria-sort="ascending">
                                                        Chức năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listVendors as $vend)
                                                <tr role="row" class="odd">
                                                    <td>
                                                        {{$vend->name}} 
                                                    </td>
                                                    <td>{{$vend->shop_name}}</td>
                                                    <td class="text-center">
                                                        <img src="upload/logo/{{$vend->logo}}" alt=""
                                                            style="height: 50px; width: 100px;">
                                                    </td>
                                                    <td>{{$vend->desc_vendor}}</td>

                                                    <td class="text-center">
                                                        <img src="upload/banner/{{$vend->banner}}" alt=""
                                                            style="height: 50px; width: 100px;">
                                                    </td>
                                                    <td>{{$vend->status}}</td>
                                                    <td class="text-center">
                                                        <a href="{{route('vendor.cap-nhat',['id'=>$vend->id])}}"
                                                            class="btn btn-warning">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('vendor.xoa',['id'=>$vend->id])}}"
                                                            onclick="return confirm('Bạn có thật sự muốn xóa')"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $listVendors->links() !!}
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