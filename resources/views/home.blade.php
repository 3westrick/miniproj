@extends('layout')
@isset($title)
    @section('title', $title)
@endisset

@section('header')
<link rel="stylesheet" type="text/css" href="{{ url('/CSS/Home.css') }}" />
@endsection

@section('content')
    <div class="mainBox">
        <div class="headerImage">
            <div class="rightHeader">
                <img class="imgRightTop" src="{{ url('/IMAGE/home/home-header-right-top.jpg') }}" alt="headerRightTop">
                <img class="imgRightBottom" src="{{ url('/IMAGE/home/home-header-right-bottom.jpg') }}" alt="headerRightBottom">
            </div>
            <div class="leftHeader">
                <img class="imgleft" src="{{ url('/IMAGE/home/home-header-left.jpg') }}" alt="hedareLeft">
            </div>

        </div>
        <div class="partition">
            <h1>آخرین محصولات</h1>
            <hr>
        </div>
        <div class="lastProduct">
            @foreach($latest_product as $product)

            <div class="imageBox">
                @if($product->discount != 0)
                <span class="discount"></span>
                @endif
                <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[0]->image) }}" alt="bag1"></a>
                <div class="secondImageBox">
                    <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[1]->image) }}" alt="bag1"></a>
                    <a href="{{ route('products.show', $product->slug) }}"><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href="{{ route('products.show', $product->slug) }}"><p>{{ $product->title }}</p></a>
                    <a href="{{ route('cart.add', $product->id) }}"> <img src="{{ url('/IMAGE/menu/ShopingCartLogo.png') }}" alt="ShopingCartLogo"></a>
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

        <div class="partition">
            <h1>آخرین محصولات مردانه</h1>
            <hr>
        </div>
        <div class="menProduct">
            @foreach($men_product as $product)

                <div class="imageBox">
                    @if($product->discount != 0)
                        <span class="discount"></span>
                    @endif
                    <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[0]->image) }}" alt="bag1"></a>
                    <div class="secondImageBox">
                        <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[1]->image) }}" alt="bag1"></a>
                        <a href="{{ route('products.show', $product->slug) }}"><div>جزئیات</div></a>
                    </div>
                    <div class="productName">
                        <a href="{{ route('products.show', $product->slug) }}"><p>{{ $product->title }}</p></a>
                        <a href="{{ route('cart.add', $product->id) }}"> <img src="{{ url('/IMAGE/menu/ShopingCartLogo.png') }}" alt="ShopingCartLogo"></a>
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

        <div class="partition">
            <h1>آخرین محصولات زنانه</h1>
            <hr>
        </div>
        <div class="womenProduct">
            @foreach($women_product as $product)

                <div class="imageBox">
                    @if($product->discount != 0)
                        <span class="discount"></span>
                    @endif
                    <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[0]->image) }}" alt="bag1"></a>
                    <div class="secondImageBox">
                        <a href="{{ route('products.show', $product->slug) }}"><img src="{{ url($product->gallery[1]->image) }}" alt="bag1"></a>
                        <a href="{{ route('products.show', $product->slug) }}"><div>جزئیات</div></a>
                    </div>
                    <div class="productName">
                        <a href="{{ route('products.show', $product->slug) }}"><p>{{ $product->title }}</p></a>
                        <a href="{{ route('cart.add', $product->id) }}"> <img src="{{ url('/IMAGE/menu/ShopingCartLogo.png') }}" alt="ShopingCartLogo"></a>
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

@endsection
