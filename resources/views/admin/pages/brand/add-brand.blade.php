
@extends('admin.layouts.master')

@section('title')
Thêm sản catagory
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm thương hiệu</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            @if(isset($brand))

            @else
                <form class="form-horizontal form-label-left" action="{{route('brand.xu-ly-them-moi')}}" method="POST" >
                @endif
                @csrf
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Thương hiệu</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="tên ....." name="name" @if(isset($brand)) value ="{{ $brand->name}}" @endif>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">Thêm thương hiệu</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection