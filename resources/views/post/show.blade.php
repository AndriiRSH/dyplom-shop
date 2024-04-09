@extends('layouts.app')

@section('content')

    <div class="">
        <header class="text-center">
            <div class="d-flex">
                <navigation-products></navigation-products>
            </div>
        </header>
    </div>
    <product :product="{{ json_encode($product) }}"></product>
{{--    <div class="container" xmlns="http://www.w3.org/1999/html">--}}
{{--        <div class="row" style="margin-top: 110px;">--}}

{{--            <div class="col-md-6" style="padding-right: 50px;">--}}
{{--                <img src="/images/withtext.jpg" alt="Image" class="img-fluid">--}}
{{--            </div>--}}

{{--            <div class="col-md-6" style="padding-left: 50px;">--}}
{{--                <h2 style="font-size: 50px">{{ $product->title }}</h2>--}}
{{--                <p style="padding-top: 50px; font-size: 30px">{{ $product->description }}</p>--}}
{{--                <p class="" style="font-size: 35px; padding-left: 130px; padding-top: 200px">{{ $product->price }} грн.</p>--}}
{{--                <button class="btn custom-btn">--}}
{{--                    До кошику--}}
{{--                    <img width="30" height="30" alt="Корзина" src="/images/cart.svg">--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <div class="col-md-6" style="padding-top: 120px">--}}
{{--                <p>{{ $product->content }}</p>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

    @include('footer')
@endsection
