@extends('layouts.app')

@section('content')

    <div class="">
{{--        <header class="text-center">--}}
        <header class="">
            <div class="d-flex">
                <navigation-products></navigation-products>
            </div>
        </header>
    </div>
    <div class="container" xmlns="http://www.w3.org/1999/html">
{{--        <h2 style="margin-top: 95px;">Оберіть товари для себе</h2>--}}
        <div class="row" style="margin-top: 105px;">

{{--        @foreach($products as $product)--}}
{{--        <div class="col-md-4 mb-4">--}}
{{--            <div class="card">--}}
{{--                <img src="{{ Storage::url('public/' . $product->preview_image) }}" class="card-img-top" alt="Зображення">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title text-center fs-2">{{ $product->title }}</h5>--}}
{{--                    <div class="d-flex justify-between align-center">--}}
{{--                        <div class="d-flex flex-column">--}}
{{--                            <span>ЦІНА:</span>--}}
{{--                            <b class="fs-4">{{ $product->price }}</b>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endforeach--}}
            @foreach($products as $product)
                <a href="{{ route('post.show', $product->id) }}" class="col-md-4 mb-4">
{{--                <router-link :to="{ name: 'product', params: { id: {{ $product->id }} } }" class="col-md-4 mb-4">--}}
                <div class="card">
{{--                <div class="card " style="height: 550px;">--}}
                        <img src="{{ Storage::url('public/' . $product->preview_image) }}" style="height: 400px; width: 400px; object-fit: cover; object-position: center; margin-right: 750px" class="card-img-top" alt="Зображення">
                        <div class="card-body">
                            <h5 class="card-title text-center fs-2" style="padding-top: 7px; padding-bottom: 7px; ">{{ $product->title }}</h5>
                            <div class="d-flex justify-content-between align-center" >
                                <div class="d-flex flex-column ">
                                    <span>ЦІНА:</span>
                                    <b class="fs-4">{{ $product->price }} ₴</b>
                                </div>

                                <basket-button :product="{{ json_encode($product) }}"></basket-button>
{{--                            <button class="btn">Ваша кнопка</button>--}}
{{--                                <a href="" class="bg-black btn">--}}
{{--                                    До кошику--}}
{{--                                    <img width="30" height="30" alt="Корзина" src="/images/cart.svg">--}}
{{--                                </a>--}}
                            </div>
                        </div>
                </div>
                    {{--                    </router-link>--}}
                </a>
            @endforeach
{{--            --}}
            <div class="d-flex justify-content-center my-4">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo; Попередня</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $products->previousPageUrl() }}" class="page-link" rel="prev">&laquo; Попередня</a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $products->nextPageUrl() }}" class="page-link" rel="next">Наступна &raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Наступна &raquo;</span>
                        </li>
                    @endif
                </ul>
            </div>

            {{----}}
    </div>
</div>

@include('footer')
@endsection
