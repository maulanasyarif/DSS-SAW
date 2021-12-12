<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginControllers;

class SiswaloginController extends DefaultLoginControllers
{
    protected $redirectTo = '/siswa/home';

    public function __construct()
    {
        $this->middleware('guest:siswa')->except('logout');
    }

    public function ShowLoginForm()
    {
        return view('auth.login.siswa');
    }

    public function username()
    {
        return 'nis';
    }

    public function guard()
    {
        return Auth::guard('siswa');
    }

}