

@extends('admin.layouts.master')

@section('title')
Danh sách category
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách loại sản phẩm</h2>
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
                                    <a href="{{route('category.them-moi')}}" class="btn bg_btnAdd">Thêm loại sản phẩm &nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>    
                                </div>
                                    <form action="{{route('category.listCategory')}}" method="get" role="search"> 
                                    <div class="col-sm-3">
                                    <input name="search" id="search" type="text" class="form-control input-sm" placeholder="Search ..."
                                    aria-controls="datatable-responsive" value="{{ \Request::get('search')}}">
                                    </div>
                                    <div class="col-sm-3">
                                    <button type="sumit" class="btn btn-primary">Tìm kiếm<i class="fa fa-search" aria-hidden="true"></i></button>
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
                                                        Tên loại</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Tên khác</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng thái
                                                    </th>
                                                    <th  tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($listCategorys as $cate)
                                                <tr role="row" class="odd">
                                                    <td>{{$cate -> cate_name}}</td>
                                                    <td>{{$cate -> alilas}}</td>
                                                    @if($cate->status==1)
                                                    <td class="text-success">Đang hoạt động</td>
                                                    @else($cate->status==2)
                                                    <td class="text-danger">Không hoạt động</td>
                                                    @endif
                                                    <td class="text-center">
                                                    <a href="{{route('category.cap-nhat',['id'=>$cate->id])}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="{{route('category.xoa',['id'=>$cate->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa???')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $listCategorys->links() !!}
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