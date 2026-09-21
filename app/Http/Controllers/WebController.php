<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        // Banner
        $banner = DB::table('banners')
            ->orderBy('id', 'asc')
            ->first();

        // Portfolios
        $portfolios = DB::table('portfolios')
            ->orderBy('id', 'asc')
            ->get();

        return view('web.index', compact('banner', 'portfolios'));
    }

    public function aboutus()
    {
        return view('web.aboutus');
    }

    public function ourservices()
    {
        return view('web.services');
    }

    public function ourblogs()
    {
        return view('web.blogs');
    }

    public function blogdetails()
    {
        return view('web.blogdetails');
    }
}