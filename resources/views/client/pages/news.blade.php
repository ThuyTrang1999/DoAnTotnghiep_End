@extends('client.layouts.master')

@section('title')
Giới thiệu
@endsection


@section('content')
<!-- about wrapper start -->
<div class="about-us-wrapper pt-60 pb-40">
    <div class="container">
    @foreach ($new_Data as $data)
        <div class="row">
            <!-- About Text Start -->
            <div class="col-lg-6 order-last order-lg-first">
                <div class="about-text-wrap">
                    <h2><span>{{$data->title}}</span>{{$data->short_desc}}</h2>
                    <p>{{$data->desc}}</p>
                </div>
            </div>
            <!-- About Text End -->
            <!-- About Image Start -->
            <div class="col-lg-5 col-md-10">
                <div class="about-image-wrap">
                    <img class="img-full" src="../upload/post/{{$data->Hinh}}"
                        alt="About Us" />
                </div>
            </div>
            <!-- About Image End -->
        </div>
        @endforeach
    </div>
</div>

</div>
<!-- team area wrapper end -->

@endsection