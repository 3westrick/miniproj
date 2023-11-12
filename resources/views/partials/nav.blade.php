<div class="mainBox topHeader">
    @auth
        <a href="#" onclick="document.getElementById('logout').submit()" class="link"><button class="inlineLogin">خروج</button></a>
        <form id="logout" style="display: none" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    @else
        <a class="link" href="{{ route('login') }}"><button class="inlineLogin {{ is_active('login') }}">ورود</button></a>
        <a class="link" href="{{ route('register') }}"><button class="inlineLogin {{ is_active('register') }}">ثبت نام</button></a>
    @endauth
    <p id="customizeDate" class="inlineDate"></p>
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">&uArr;</button>
<div class="mainBox topBarLogo">
    <img src="{{ url('/IMAGE/logo/TopBarLogo.png') }}" alt="TopBarLogo">
</div>
<div class="mainBox menu">
    <ul>
        <a href="{{ route('home') }}" class="linkMenu"><li class="{{ is_active('home') }}">خانه</li></a>
        <li class="dropdown ">
            <button class="dropbtn"><a href="{{ route('products.index') }}">محصولات</a></button>
            <div class="dropdown-content">
                <a class="linkMenu" href="../Product/Product.html">مردانه</a>
                <a class="linkMenu" href="../Product/Product.html">زنانه</a>
                <a class="linkMenu" href="../Product/Product.html">کودکانه</a>
            </div>
        </li>
        <a class="linkMenu" href="{{ route('contact') }}"><li class="{{ is_active('contact') }}">تماس با ما</li></a>
        <a class="linkMenu" href="{{ route('faq') }}"><li class="{{ is_active('faq') }}">سوالات متداول</li></a>
        <a class="linkMenu" href="{{ route('tac') }}"><li class="{{ is_active('tac') }}">قوانین و مقررات</li></a>
        <li class="ShopingCartLogo dropdown">
            <span class="ShopingCartCounter center dropbtn">{{ Cart::count() }}</span>
            <div class="dropdown-content">
                <a class="btn" href="{{ route('cart.index') }}">فاکتور کن</a>
                @foreach(Cart::all() as $product_id)
                    @php
                        $product = \App\Models\Product::where('id', $product_id)->first();
                    @endphp
                <a class="linkMenu" href="{{ route('products.show', $product) }}">
                    <img class="cart" src="{{ url($product->gallery[0]->image) }}" alt="dress1-1">
                    <div class="box">
                        <div class="detail">
                            <span>{{ substr($product->title, 0, 10) }}</span>
                            @if($product->discount != 0)
                                <del>{{ $product->price }} ريال</del>
                            @endif
                            <ins>{{ $product->price - $product->discount }} ريال</ins>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </li>
    </ul>
</div>
<div class="whiteSpace"></div>
