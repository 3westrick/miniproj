@extends('layout')
@section('title', 'محصولات')

@section('header')
    <link rel="stylesheet" href="{{ url('/CSS/Product.css') }}">
@endsection

@section('content')
    <div class="mainBox customizeLayout">
        <div class="horizontalPart">
            <div class="horizontalRightPart">
                <ul>
                    <li><a href="">خانه</a></li>/
                    <li><a href="">مردانه</a></li>/
                    <li><a href="">لباس</a></li>
                </ul>
            </div>
            <div class="horizontalLeftPart">
                <div class="productAmount">
                    <p>مجموع محصولات در حال نمایش: </p>
                    <span id="counter">{{ count($products) }}</span>
                </div>
                <div class="sortProduct">
                    <select name="sorting" id="sort" oninput="selectMode()">
                        <option value="1">قدیمی ترین</option>
                        <option value="2">جدید ترین</option>
                        <option value="3">ارزان ترین</option>
                        <option value="4">گران ترین</option>
                    </select>
                </div>
                <div class="searchProduct">
                    <input type="search" name="searchBox" id="searchBox" placeholder="محصول مورد نظر خود را وارد کنید">
                    <button id="search" onclick="searchProduct()">&#9935;</button>
                </div>
            </div>
        </div>
        <div class="contectBox">
            <div class="helpPart">
                <div class="latestMenProduct">
                    <h1>آخرین محصولات مردانه</h1>
                    <div class="smallShowProduct">
                        <div class="smallImage">
                            <a href=""><img src="../../IMAGE/product/hoodie1-1-700x893.jpg" alt="hoodie1"></a>
                        </div>
                        <div class="smallDetail">
                            <a href=""><p>هودی</p></a>
                            <del>700000 ريال</del>
                            <ins>600000 ريال</ins>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="latestWomenProduct">
                    <h1>آخرین محصولات زنانه</h1>
                    <div class="smallShowProduct">
                        <div class="smallImage">
                            <a href=""><img src="../../IMAGE/product/dress1-1-700x893.jpg" alt="dress1"></a>
                        </div>
                        <div class="smallDetail">
                            <a href=""><p>لباس مجلسی</p></a>
                            <del>700000 ريال</del>
                            <ins>600000 ريال</ins>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="allTags">
                    <h1>تگ ها</h1>
                    @foreach(\App\Models\Category::where('order', 3)->get() as $cat)
                        <button><a href="">{{ $cat->name }}</a></button>
                    @endforeach
                </div>
            </div>
            <div id="productBox" class="showProduct">
                @foreach($products as $product)
                <div id="{{ $product->id }}" data-price="{{ $product->price }}" data-name="{{ $product->title }}" class="imageBox">
                    @if($product->discount != 0)
                    <span class="discount"></span>
                    @endif
                    <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[0]->image) }}" alt="bag1"></a>
                    <div class="secondImageBox">
                        <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[1]->image) }}" alt="bag1"></a>
                        <a href=""><div>جزئیات</div></a>
                    </div>
                    <div class="productName">
                        <a href="{{ route('products.show', $product->slug) }}"><p>{{ $product->title }}</p></a>
                        <a href="{{ route('cart.add', $product->id) }}"><img src="{{ url('/IMAGE/menu/ShopingCartLogo.png') }}" alt="ShopingCartLogo"></a>
                    </div>
                    <div class="tag">
                        @foreach($product->categories as $cat)
                            <span><a href="">{{ $cat->name }}</a></span>,
                        @endforeach
                    </div>
                    <div class="price">
                        @if($product->discount != 0)
                            <del>{{ $product->price }} ريال</del>
                        @endif
                        <ins>{{ $product->price - $product->discount }} ريال</ins>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="horizontalPart">
            <div id="pagination" class="pagination"></div>
        </div>
    </div>
    <div class="whiteSpace"></div>

    <script src="{{ url('/JS/Product.js') }}"></script>
@endsection
