

@extends('admin.layouts.master')

@section('title')
Danh sách category
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách thương hiệu</h2>
                          
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
                                    <a href="{{route('brand.them-moi')}}" class="btn bg_btnAdd">Thêm thương hiệu&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-sm-6">
                                       
                                    </div>
                                </div>
                               <form action="{{route('brand.listBrand')}}" method="get" role="search"> 
                                    <div class="col-sm-3">
                                    <input name="search" id="search" type="text" class="form-control input-sm" placeholder="Search ..."
                                    aria-controls="datatable-responsive" value="{{ \Request::get('search')}}">
                                    </div>
                                    <div class="col-sm-3">
                                    <button type="sumit" class="btn btn-primary">Search<i class="fa fa-search" aria-hidden="true"></i></button>
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
                                                <!-- <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Id</th> -->
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Tên thương hiệu</th>
                                                    
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng Thái
                                                    </th>
                                                    <th  tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Function</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($listBrand as $brand)
                                                <tr role="row" class="odd">
                                                   
                                                    <td>{{$brand -> brand_name}}</td>
                                                    
                                                    
                                                    @if ($brand -> status==1)
                                                    <td class="text-success">Đang hoạt động</td>
                                                    @else if(($brand -> status==2)
                                                    <td class="text-danger">Đã Xóa</td>
                                                    @endif
                                                    
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-warning">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $listBrand->links() !!}
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
<div class="row">
                                   
                                    <div class="col-sm-12">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="datatable-responsive_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled"
                                                    id="datatable-responsive_previous"><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="0"
                                                        tabindex="0">Previous</a></li>
                                                <li class="paginate_button active"><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="1"
                                                        tabindex="0">1</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="2"
                                                        tabindex="0">2</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="3"
                                                        tabindex="0">3</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="4"
                                                        tabindex="0">4</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="5"
                                                        tabindex="0">5</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="6"
                                                        tabindex="0">6</a></li>
                                                <li class="paginate_button next" id="datatable-responsive_next"><a
                                                        href="#" aria-controls="datatable-responsive" data-dt-idx="7"
                                                        tabindex="0">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
@endsection