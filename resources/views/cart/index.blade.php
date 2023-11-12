@extends('layout')
@section('title', 'سبد خرید')

@section('header')
    <link rel="stylesheet" href="{{ url('/CSS/Cart.css') }}">
@endsection

@section('content')
    <div class="mainBox finalCart">
        <h1>سبد خرید</h1>
        <table>
            <thead>
            <tr>
                <th></th>
                <th>تصویر محصول</th>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>تعداد</th>
                <th>قیمت کل</th>
            </tr>
            </thead>
            <tbody>
            @php
                $price = 0;
            @endphp
            @foreach($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('cart.remove', $product->id) }}"><img class="removeImage" src="{{ url('/IMAGE/logo/removeIcon.png') }}" alt="removeIcon"></a>
                    </td>
                    <td>
                        <a href=""><img class="productImage" src="{{ url($product->gallery[0]->image) }}" alt="dress1"></a>
                    </td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }} ريال</td>
                    <td>
                        <input type="button" value="+">
                        <input type="text" value="1">
                        <input type="button" value="-">
                    </td>
                    <td>{{ $product->price }} ريال</td>
                </tr>
                @php
                    $price+=$product->price;
                @endphp
            @endforeach
            </tbody>
        </table>
        <div class="underTable">
            <div class="rightPart">
                <a href="../Checkout/Checkout.html"><button>تایید نهایی</button></a>
            </div>
            <div class="leftPart">
                <input type="text" name="giftCode" placeholder="کد تخفیف خود را وارد کنید">
                <a href=""><button>ثبت کد تخفیف</button></a>
            </div>
        </div>
        <div class="factor">
            <table>
                <thead>
                <tr>
                    <th colspan="2">جمع بندی سبد خرید</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>جمع کل سبد خرید</td>
                    <td>{{ $price }} ﷼</td>
                </tr>
                <tr>
                    <td>هزینه ارسال</td>
                    <td>رایگان</td>
                </tr>
                <tr>
                    <td>کد تخفیف</td>
                    <td>ندارد</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>جمع کل </th>
                    <th>{{ $price }} ﷼</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="whiteSpace"></div>
@endsection
