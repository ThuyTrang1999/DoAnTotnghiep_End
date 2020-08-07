@extends('admin.layouts.master')

@section('title')
Thêm bài viết
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2> Thêm Bài viết </h2><br>
                    <form action="{{route('post.xu-ly-them-moi')}}" method="POST" enctype="multipart/form-data">
            </div>
            @csrf
            @if (count($errors) > 0)
                <ul>
                @foreach ($errors->all() as $error)
                    <div class = 'alert alert-danger'>
                        <li>{{ $error }}</li>   
                    </div>
                    @endforeach
                </ul> 
            @endif
            @if(session('thongbao'))
                <div class = 'alert alert-success'>
                    {{section('thongbao')}}
                </div>
            @endif
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                   <!-- <input type="hiden" name="_token" value="{{csrf_token()}}" /> -->
                   <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Tiêu đề</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề"@if(isset($addPost)) value="{{ $addPost->title }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Hình ảnh</label>
                            <div class="col-md-10 col-sm-10 ">
                            <input type="file" name="Hinh" @if(isset($addPost)) value="{{ $addPost->Hinh }}" @endif/>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Mô tả</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="short_desc" id="" cols="10" rows="5" class="form-control"
                                    placeholder="Nhập mô tả">@if(isset($addPost)) {{ $addPost->short_desc}}
                                    @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Nội dung</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="desc" id="" cols="10" rows="5" class="form-control"
                                    placeholder="Nhập nội dung">@if(isset($addPost)) {{ $addPost->desc}} @endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Tài khoản</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select name="pst_user" class="form-control">
                                @foreach($dataUser as $dataU)
                                    <option value="{{$dataU->id}}">{{ $dataU->user_name  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Trạng thái</label>
                            <div class="col-md-10 col-sm-10 ">
                            <select name="status" class="form-control">
                                    <option value="1">Ðang hoạt động</option>
                                    <option value="2">Ngừng hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">
                                Thêm bài viêt
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection