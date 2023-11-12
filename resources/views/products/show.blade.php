@extends('layout')
@section('title', 'محصولات')

@section('header')
    <link rel="stylesheet" href="{{ url('/CSS/SingleProduct.css') }}">
@endsection

@section('content')
    <div class="mainBox singleProduct">
        <div class="verticalPart">
            <div class="productRoute">
                <ul>
                    <li><a href="">خانه</a></li>/
                    <li><a href="">زنانه</a></li>/
                    <li><a href="">لباس</a></li>
                </ul>
            </div>
            <div class="productDescription">
                <h1>{{ $product->title }}</h1>
                <h2>{{ $product->description }}</h2>
                @if($product->discount != 0)
                    <del>{{ $product->price }} ريال</del>
                @endif
                <ins>{{ $product->price - $product->discount }} ريال</ins>
            </div>
            <div class="productCounter">
                <form action="{{ route('cart.add', $product->id) }}">
                    <input type="button" value="+" onclick="increment()">
                    <input type="number" name="quantity" value="1" id="productQuantity">
                    <input type="button" value="-" onclick="decrement()">
                    <input type="submit" value="افزودن به سبد خرید">
                </form>
            </div>
            <div class="productDetail">
                <div class="productCategory">
                    <span>دسته بندی: </span>
                    <p><a href="">{{ $product->category->name }}</a></p>
                </div>
                <div class="productTag">
                    <span>تگ ها: </span>
                    @foreach($product->categories as $category)
                        <p><a href="">{{ $category->name }}</a></p>@if(!$loop->last) ، @endif

                    @endforeach
                </div>
            </div>
        </div>
        <div class="verticalPart">
            <div class="productImage">
                <img id="show" src="{{ url($product->gallery[0]->image) }}" alt="dress1">
            </div>
            <div class="allImage">
                <img onclick="selectFirstImage()" id="first" src="{{ url($product->gallery[0]->image) }}" alt="dress1">
                <img onclick="selectSecondImage()" id="second" src="{{ url($product->gallery[1]->image) }}" alt="dress1">
            </div>
        </div>
        <div class="horizontalPart">
            <div class="tab">
                <button onclick="descriptionTab()">توضیحات</button>
                <button onclick="commentTab()">نظر ها (0)</button>
            </div>
            <div id="description" class="tabcontent">
                <p>{{ $product->title }}</p>
                <p>{{ $product->description }}</p>
            </div>
            <div id="comment" class="tabcontent">
                <div class="user">
                    <p>حسین پورقدیری</p>
                </div>
                <div class="userComment">
                    <p>لباس بسیار مناسبی است.</p>
                </div>
                <hr>
                <div class="newComment">
                    <form action="">
                        <textarea name="comment" placeholder="نظر خود را بنویسید ..."></textarea>
                        <input type="submit" value="ثبت نظر">
                    </form>
                </div>
            </div>
        </div>
        <div class="partition">
            <h1>آخرین محصولات</h1>
            <hr>
        </div>
        <div class="relatedProduct">
            @foreach($last_products as $product)
            <div class="imageBox">
                <span class="discount"></span>
                <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[0]->image) }}" alt="bag1"></a>
                <div class="secondImageBox">
                    <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[1]->image) }}" alt="bag1"></a>
                    <a href="{{ route('products.show', $product->slug) }}"><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href="{{ route('products.show', $product->slug) }}"><p>{{ $product->title }}</p></a>
                    <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url('/IMAGE/menu/ShopingCartLogo.png') }}" alt="ShopingCartLogo"></a>
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
    <div class="whiteSpace"></div>

    <script src="{{ url('/JS/SingleProduct.js') }}"></script>
@endsection
