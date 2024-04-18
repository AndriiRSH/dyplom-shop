 <footer>
        <div class="contact_wrap">
            <address>
                <a href="#">Чернівці, Хотинська</a>
            </address>
            <a href="#">design.moskalenko@gmail.com</a> <br>
            <a href="">+380996927001</a> <br>
            <a href="">+380996927002</a> <br>
            <a href="">+380996927003</a>
        </div>
        <div class="menu_wrap">
            <a href="#">Головна</a> <br>
            @foreach($categories as $category)
            <a href="{{ route('category.product.index', $category->id) }}">{{ $category->title }}</a> <br>
            @endforeach
        </div>
        <div class="menu_wrap">
            <a href="" class="fa-brands fa-instagram fa-2xl pl-3"></a>
            <a href="" class="fa-brands fa-facebook fa-2xl p-3"></a>
            <a href="" class="fa-brands fa-telegram fa-2xl"></a>
        </div>
 </footer>

