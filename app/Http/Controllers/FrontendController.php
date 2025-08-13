<?php

namespace App\Http\Controllers;

use App\Models\AppConfiguration;
use App\Models\Blog;
use App\Models\Category;
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
        $category = Category::withCount('blogs')->orderBy("id", "desc")->get();
        $blogs = Blog::orderBy("id", "desc")->paginate(3);
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();
        return view("layouts.pages.blogs", compact("category", "blogs", "recentBlogs"));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view("layouts.pages.single-blog", compact("blog"));
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
