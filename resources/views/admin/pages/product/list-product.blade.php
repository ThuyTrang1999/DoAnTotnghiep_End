@extends('admin.layouts.master')

@section('title')
Danh sách sản phẩm
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách sản phẩm</h2>
                
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
                                    <a href="{{route('product.them-moi')}}" class="btn bg_btnAdd">Add product &nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <form action="{{route('product.listProduct')}}" method="get" role="search"> 
                                    <div class="col-sm-3">
                                    <input name="search" id="search" type="text" class="form-control input-sm" placeholder="Search ..."
                                    aria-controls="datatable-responsive" value="{{ \Request::get('search')}}">

                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" name="cate" id="cate">   
                                        <option value="">danh mục</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}"> {{$category->cate_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" name="status" id="status">   
                                       
                                        
                                            <option value="">Tất cả</option>
                                            <option value="1">Đang hoạt động</option>
                                            <option value="0">Không hoạt động</option>
                                        
                                    </select>
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
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Tên sản phẩm</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Đơn vị</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        SKU</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                     Thương hiệu</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Hình ảnh</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">
                                                        Mô Tả
                                                    </th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Mô tả ngắn
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Danh mục
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Tác Giả
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Giá
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">
                                                        Giá khuyến mãi
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Trạng thái
                                                    </th>
                                                    <th tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                                        colspan="1" style="width: 81px;" aria-sort="ascending">
                                                        hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listProduce as $prod)
                                                <tr role="row" class="odd">
                                                    <td>{{$prod->name}}</td>
                                                    <td>{{$prod->unit}}</td>
                                                    <td>{{$prod->SKU}}</td>
                                                    <td>{{$prod->brand_name}}</td>
                                                    <td>
                                                    
                                                        <img src="upload/product/{{$prod->url}}" alt=""
                                                            style="width: 50px; height: 50px;">
                                                        
                                                    </td>
                                                    <td>{{$prod->desc}}</td>
                                                    <td>{{$prod->short_desc}}</td>

                                                    <td>{{$prod->cate_name}}</td>

                                                    <td>{{$prod->shop_name}}</td>
                                                    <td>{{$prod->price}}</td>
                                                    <td>{{$prod->discout_price}}</td>
                                                    @if($prod->status==1)
                                                    <td class="text-success">Đang hoạt động</td>
                                                    @else
                                                    <td class="text-danger">Không hoạt động</td>
                                                    @endif

                                                    <td class="text-center">
                                                    <a href="{{route('product.cap-nhat',['id'=>$prod->id])}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                       
                                                       <a href="{{route('product.xoa',['id'=>$prod->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa???')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $listProduce->links() !!}
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
        <div class="dataTables_paginate paging_simple_numbers" id="datatable-responsive_paginate">
            <ul class="pagination">
                <li class="paginate_button previous disabled" id="datatable-responsive_previous"><a href="#"
                        aria-controls="datatable-responsive" data-dt-idx="0" tabindex="0">Previous</a></li>
                <li class="paginate_button active"><a href="#" aria-controls="datatable-responsive" data-dt-idx="1"
                        tabindex="0">1</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="2"
                        tabindex="0">2</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="3"
                        tabindex="0">3</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="4"
                        tabindex="0">4</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="5"
                        tabindex="0">5</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="6"
                        tabindex="0">6</a></li>
                <li class="paginate_button next" id="datatable-responsive_next"><a href="#"
                        aria-controls="datatable-responsive" data-dt-idx="7" tabindex="0">Next</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection