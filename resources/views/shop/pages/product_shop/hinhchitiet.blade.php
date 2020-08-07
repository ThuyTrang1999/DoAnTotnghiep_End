@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')
<div class="shop_list_product">
    <div class="li-section-title mt-10">
        <h2>
            <span>Hình Chi tiết</span>
        </h2>
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
                                                        Tên sản phẩm</th>
                                                   
                                                        <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Hình ảnh chi tiết</th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr role="row" class="odd">
                                               
                                                    <td>{{$sp->name}}</td>
                                                    <td> @foreach ($imgchitiet as $img)
                                                    <img src="../../upload/product/{{ $img->url}}" alt=""
                                                            style="width: 50px; height: 50px;">
                                                    @endforeach</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


</div>
@endsection