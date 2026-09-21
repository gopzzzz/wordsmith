<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }
    public function aboutus(){
         return view('web.aboutus');
    }
    public function ourservices(){
         return view('web.services');
    }
    public function ourblogs(){
          return view('web.blogs');
    }
    public function blogdetails(){
        return view('web.blogdetails');
    }
   
}
