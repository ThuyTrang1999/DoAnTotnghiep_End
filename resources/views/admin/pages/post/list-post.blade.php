@extends('admin.layouts.master')

@section('title')
Danh sách bài viết
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Danh sách bài viết</h2>
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
                                        <a style="margin-top: 0 !important;" href="{{route('post.them-moi-post')}}" class="btn bg_btnAdd">Thêm bài viết
                                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-sm-6">

                                        <form style="float: right;" action="{{route('post.listPost')}}" method="get" role="search">
                                            <div class="col-sm-10 p-0">
                                                <input name="search" id="search" type="text"
                                                    class="form-control input-sm" placeholder="Tìm kiếm"
                                                    aria-controls="datatable-responsive"
                                                    value="{{ \Request::get('search')}}">
                                            </div>
                                            <div class="col-sm-2 p-0">
                                                <button type="sumit" class="btn btn-primary" style="border-radius: 0 !important;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </form>
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
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Tiêu đề</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Hình ảnh</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Mô tả</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Nội dung</th>
                                                    
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng
                                                        thái
                                                    </th>
                                                    <th tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                                        colspan="1" style="width: 81px;" aria-sort="ascending">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPost as $lpost)
                                                <tr>
                                                    <td>{{$lpost->title}}</td>
                                                    <td class="text-center">
                                                        <img src="upload/post/{{$lpost->Hinh}}" alt=""
                                                            style="height: 50px; width: 100px;">
                                                    </td>
                                                    <td>{{$lpost->short_desc}}</td>
                                                    <td>{{$lpost->desc}}</td>
                                                    @if($lpost->status==1)
                                                    <td class="text-success">Đang hoạt động</td>
                                                    @else($lpost->status==2)
                                                    <td class="text-danger">Không hoạt động</td>
                                                    @endif
                                                    <td class="text-center">
                                                        <a href="{{route('post.cap-nhat',['id'=>$lpost->id])}}"
                                                            class="btn btn-warning">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('post.xoa',['id'=>$lpost->id])}}"
                                                            onclick="return confirm('Bạn có thật sự muốn xóa')"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $listPost->links() !!}
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