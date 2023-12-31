@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ url('/CSS/Register.css') }}" />
@endsection

@section('content')
    <div class="mainBox register">
        <h1>ثبت نام</h1>
        <hr>
        <div class="registerBox">
            <form method="POST" autocomplete="on">
                @csrf
                <input value="{{ old('name') }}" type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید">
                <input value="{{ old('phone') }}" type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
                <input value="{{ old('email') }}" type="text" name="email" placeholder="پست الکترونیک خود را وارد کنید">
                <input type="password" name="password" placeholder="رمز عبور خود را وارد کنید">
                <input type="submit" value="ارسال کن">
            </form>
        </div>
        <div class="guideBox">
            <p>فرم آزمایشی پروژه پل استار جهت آموزش بهتر و کاردبری تر با ضاهر مناسب جهت ارتباط گیری بیشتر با مبحث تحصیلی می باشد</p>
            <p>شماره تماس: 34911-013</p>
            <p>آدرس: گیلان - رشت - گلسار - چهار راه اصفهان</p>
            <p>پست الکترونیک: info@poulstar.com</p>
        </div>
    </div>
    <div class="whiteSpace"></div>
@endsection
