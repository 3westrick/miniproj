<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function store(RegisterRequest $request){
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return to_route('login')->with('message', 'اطلاعات شما با موفقیت ثبت شد');
    }

    public function authenticate(LoginRequest $request){
        $data = $request->validated();

        if (auth()->attempt(['phone' => $data['phone'], 'password' => $data['password']])){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'شما با موفقیت ورود کردید');
        }else {
            return back()->withErrors(['phone'=> 'اطلاعات وارد شده اشتباه است'])->onlyInput('phone');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'با موقیت از حساب خود خارج شدید');
    }
}
