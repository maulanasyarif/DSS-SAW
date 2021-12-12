<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
// use App\Http\Controllers\Response;

class LandingController extends Controller
{
    
    public function index()
    {
        return view('landing');
    }

}