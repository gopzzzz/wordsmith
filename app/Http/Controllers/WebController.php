<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    // =========================
    // HOME PAGE
    // =========================

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

        // Homepage About
        $homepage = DB::table('homepages')
            ->orderBy('id', 'asc')
            ->first();

        // Services
        $services = DB::table('services')
            ->orderBy('id', 'asc')
            ->get();

        // Testimonials
        $testimonials = DB::table('testimonials')
            ->orderBy('id', 'asc')
            ->get();

        return view('web.index', compact(
            'banner',
            'portfolios',
            'homepage',
            'services',
            'testimonials'
        ));
    }


    // =========================
    // ABOUT US PAGE
    // =========================

    public function aboutus()
    {
        // Banner
        $banner = DB::table('banners')
            ->orderBy('id', 'asc')
            ->first();

        // Homepage About, Vision & Mission
        $homepage = DB::table('homepages')
            ->orderBy('id', 'asc')
            ->first();

        return view('web.aboutus', compact(
            'banner',
            'homepage'
        ));
    }


    // =========================
    // SERVICES PAGE
    // =========================

   public function ourservices()
{
    $services = DB::table('services')
        ->orderBy('id', 'asc')
        ->get();

    return view('web.services', compact('services'));
}
    // =========================
    // BLOGS PAGE
    // =========================

   public function ourblogs()
{
    $blogs = DB::table('blogs')
        ->orderBy('id', 'desc')
        ->get();

    return view('web.blogs', compact('blogs'));
}


    // =========================
    // BLOG DETAILS PAGE
    // =========================

    public function blogdetails()
    {
        $blogs = DB::table('blogs')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.blogdetails', compact('blogs'));
    }
}