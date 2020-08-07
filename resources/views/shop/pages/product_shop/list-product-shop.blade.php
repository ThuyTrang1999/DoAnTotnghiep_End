@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')
<div class="shop_list_product">
    <div class="li-section-title mt-10">
        <h2>
            <span>Danh sách sản phẩm</span>
        </h2>
    </div>

    <form action="{{route('shopProduct.listShopProduct')}}" method="get" role="search">
        <div class="row">
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
                    <option value="2">Không hoạt động</option>

                </select>
            </div>
            <div class="col-sm-3">
                <button type="sumit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>

    <div class="row">

        <div class="col-sm-12">
            <table id="datatable-responsive"
                class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info"
                style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                            colspan="1" style="width: 81px;" aria-sort="ascending">
                            Tên sản phẩm</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 80px;">Đơn vị</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 176px;">
                            SKU</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 176px;">
                            Hình ảnh</th>

                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 176px;">
                            Hình ảnh chi tiết</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 166px;" aria-label="E-mail: activate to sort column ascending">Thương Hiệu
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 166px;" aria-label="E-mail: activate to sort column ascending">Loại sản phẩm
                        </th>

                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 166px;" aria-label="E-mail: activate to sort column ascending">Giá
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 166px;" aria-label="E-mail: activate to sort column ascending">
                            Giá KM
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 166px;" aria-label="E-mail: activate to sort column ascending">Trạng thái
                        </th>
                        <th tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                            style="width: 81px;" aria-sort="ascending">
                            Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listProducesCategory as $listProCate)
                    <tr role="row" class="odd">
                        <td>{{$listProCate->name}}</td>
                        <td>{{$listProCate->unit}}</td>
                        <td>{{$listProCate->SKU}}</td>
                        <td>
                            <img src="../../upload/product/{{$listProCate->url}}" alt=""
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>

                            <a href="{{route('shopProduct.hinhchitiet',[$listProCate->produce_id])}}"
                                class="btn btn-warning">
                                Hình Chi tiết
                            </a>

                        </td>
                        <td>{{$listProCate->brand_name}}</td>
                        <!-- <td>{{$listProCate->desc}}</td> -->
                        <td>{{$listProCate->cate_name}}</td>

                        <td>{{$listProCate->price}}</td>
                        <td>{{$listProCate->discout_price}}</td>
                        @if($listProCate->status==1)
                        <td class="text-success">Đang hoạt động</td>
                        @else
                        <td class="text-danger">Không hoạt động</td>
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
            {!! $listProducesCategory->links() !!}
        </div>
    </div>
</div>
@endsection