@extends('admin.layouts.master')

@section('title')
Cập nhật người dùng
@endsection
@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection
@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật người dùng </h2><br>
                <form action="{{route('customer.xu-ly-cap-nhat',['id'=>$cus->id])}}" method="POST"
                    enctype="multipart/form-data">
            </div>
            @csrf
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <div class='alert alert-danger'>
                    <li>{{ $error }}</li>
                </div>
                @endforeach
            </ul>
            @endif
            @if(session('Thongbao'))
            <div class='alert alert-success'>
                {{section('Thongbao')}}
            </div>
            @endif
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Quyền</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="role" tabindex="-1">
                                    @if($cus -> role == 1){
                                    <option selected value="1">Chủ shop</option>
                                    <option value="2">khách</option>}
                                    @else
                                    <option selected value="2">khách</option>
                                    <option value="1">Chủ shop</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection