@extends('layouts.app')

@section('content')
    <carousel></carousel>
    <div class="d-flex justify-content-center align-items-center">
        <div>
            <img class="" src="/images/withtext.png" alt="">
        </div>
        <div class="about_text p-4">
            <p class="about_title"><span class="site-link active font-30 font-mob-24 weight-400">ПРО СТУДІЮ</span></p>
            <br>
            <p class="about_description font-14 font-mob-14 weight-300">
                Десять років тому нас об'єднала віра, що дизайн – це простір для зручного і щасливого життя, а не красиві картинки. Кожен використовує цей простір по своєму, тому дизайн у кожного повинен теж бути свій. <br>
                Спочатку ми втілювали ці ідеї у дизайн-проектах квартир і будинків, у схематичних малюнках ландшафтів. Потім переносили бачення у архітектурні замовлення, ніби змальовували характер власників. Підкорювали простір під ритм, звички та спосіб життя мешканців.<br>
                Власні вимоги до результату зростали і ми почали відмовлятись від підрядників. До нас приєднувались дизайнери, інженери та будівельники, які розділяли такі ж погляди. Тому зараз ми контролюємо увесь процес від створення ідеї і до останнього нанесення фарби. <br>
                За ці роки, наші замовники отримали не просто десятки архітектурних і дизайнерських проектів Вони отримали свій власний простір, для такого життя, яке їм личить і яке їм подобається.
            </p>
        </div>
    </div>

    {{--    <div class="d-flex">--}}
{{--        <div>--}}
{{--            <img class="move-right" src="/images/withtext.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="about_text p-4">--}}
{{--            <p class="about_title"><span class="site-link active font-30 font-mob-24 weight-400">ПРО СТУДІЮ</span></p>--}}
{{--            <br>--}}
{{--            <p class="about_description font-14 font-mob-14 weight-300">Десять років тому нас об'єднала віра, що дизайн – це простір для зручного і щасливого життя, а не красиві картинки. Кожен використовує цей простір по своєму, тому дизайн у кожного повинен теж бути свій. <br>--}}
{{--                Спочатку ми втілювали ці ідеї у дизайн-проектах квартир і будинків, у схематичних малюнках ландшафтів. Потім переносили бачення у архітектурні замовлення, ніби змальовували характер власників. Підкорювали простір під ритм, звички та спосіб життя мешканців.<br>--}}
{{--                Власні вимоги до результату зростали і ми почали відмовлятись від підрядників. До нас приєднувались дизайнери, інженери та будівельники, які розділяли такі ж погляди. Тому зараз ми контролюємо увесь процес від створення ідеї і до останнього нанесення фарби. <br>--}}
{{--                За ці роки, наші замовники отримали не просто десятки архітектурних і дизайнерських проектів Вони отримали свій власний простір, для такого життя, яке їм личить і  яке їм подобається.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
    <button-connect></button-connect>
    <div class="home projects">
        <div class="headline">
            <p class="category">ПЕРЕГЛЯНЬТЕ ПРОЕКТИ СТУДІЇ</p>
        </div>
        <div class="container mt-4">
            <div class="row">
{{--                @foreach($categories as $category)--}}
                    <div class="col-md-6 thumbex">
                    <div class="thumbnail">
                        <a href="{{ route('category.product.index', 1) }}">
{{--                            <img src="https://bit.ly/2vnI5ZM" alt="Beaches"/>--}}
                            <img src="/images/main-kartyny.jpg" alt="Beaches"/>
                            <span>Картини</span>
{{--                            <span>{{ $category->title }}</span>--}}
                        </a>
                    </div>
                </div>

                <div class="col-md-6 thumbex">
                    <div class="thumbnail">
                        <a href="{{ route('category.product.index', 2) }}">
                            <img src="/images/main-skulptura.jpg" alt="Beaches"/>
                            <span>Скульптури</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 thumbex">
                    <div class="thumbnail">
                        <a href="{{ route('category.product.index', 3) }}">
                            <img src="/images/main-dekor.jpg" alt="Beaches"/>
                            <span>Декор</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 thumbex">
                    <div class="thumbnail">
                        <a href="{{ route('category.product.index', 4) }}">
                            <img src="/images/main-design.jpg" alt="Beaches"/>
                            <span>Дизайн</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @include('footer')
@endsection



