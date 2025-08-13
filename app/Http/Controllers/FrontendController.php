<?php

namespace App\Http\Controllers;

use App\Models\AppConfiguration;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view("layouts.pages.home");
    }
    public function about()
    {
        return view("layouts.pages.about");
    }

    public function service()
    {
        return view("layouts.pages.service");
    }

    public function blogs()
    {
        return view("layouts.pages.blogs");
    }

    public function singleBlog($slug)
    {
        return view("layouts.pages.about");
    }

    public function contact()
    {
        return view("layouts.pages.contact");
    }

    public function policy($slug)
    {
        return view("layouts.pages.about");
    }

}
