 <footer>
        <div class="contact_wrap">
            <address>
                <a href="#">Чернівці, вул. Хотинська, 43</a>
            </address>
            <a href="#">design.moskalenko@gmail.com</a> <br>
            <a href="">+380956449469</a> <br>
            <a href="">+380997288642</a>
        </div>
        <div class="menu_wrap">
            <a href="/">Головна</a> <br>
            @foreach($categories as $category)
            <a href="{{ route('category.product.index', $category->id) }}">{{ $category->title }}</a> <br>
            @endforeach
        </div>
        <div class="menu_wrap">
            <a href="https://www.instagram.com/design_moskalenko/" class="fa-brands fa-instagram fa-2xl pl-3"></a>
            <a href="https://www.facebook.com/p/%D0%94%D0%B8%D0%B7%D0%B0%D0%B9%D0%BD-%D1%81%D1%82%D1%83%D0%B4%D0%B8%D1%8F-%D0%A0%D0%BE%D0%BC%D0%B0%D0%BD%D0%B0-%D0%9C%D0%BE%D1%81%D0%BA%D0%B0%D0%BB%D0%B5%D0%BD%D0%BA%D0%BE-100042244844816/" class="fa-brands fa-facebook fa-2xl p-3"></a>
            <a href="" class="fa-brands fa-telegram fa-2xl"></a>
        </div>
 </footer>

