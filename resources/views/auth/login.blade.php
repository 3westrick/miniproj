@extends('layout')

@section('title', 'ورود')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ url('/CSS/Login.css') }}" />
@endsection

@section('content')
    <div class="mainBox login">
        <h1>ورود</h1>
        <hr>
        <div class="loginBox">
            <form method="POST">
                @csrf
                <input value="{{ old('phone') }}" type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
                <input value="" type="password" name="password" placeholder="رمز عبور خود را وارد کنید">
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
