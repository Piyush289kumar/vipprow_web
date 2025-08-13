<?php

namespace App\Http\Controllers;

use App\Models\AppConfiguration;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();

        return view("layouts.pages.home", compact("recentBlogs"));
    }
    public function about()
    {
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();

        return view("layouts.pages.about", compact("recentBlogs"));
    }

    public function service()
    {
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();

        return view("layouts.pages.service", compact("recentBlogs"));
    }

    public function blogs()
    {
        $category = Category::withCount('blogs')->orderBy("id", "desc")->get();
        $blogs = Blog::orderBy("id", "desc")->paginate(3);
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();
        return view("layouts.pages.blogs", compact("category", "blogs", "recentBlogs"));
    }

    public function blogsByCategory($slug)
    {
        $category = Category::withCount('blogs')->orderBy("id", "desc")->get();
        $currentCategory = Category::where('slug', $slug)->firstOrFail();

        $blogs = Blog::where('category_id', $currentCategory->id)
            ->orderBy("id", "desc")
            ->paginate(3);

        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();

        return view("layouts.pages.blogs", compact("category", "blogs", "recentBlogs", "currentCategory"));
    }


    public function singleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $category = Category::withCount('blogs')->orderBy("id", "desc")->get();
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();
        return view("layouts.pages.singleBlog", compact("blog", "category", "recentBlogs"));
    }


    public function contact()
    {
        $recentBlogs = Blog::orderBy("id", "desc")->limit(3)->get();

        return view("layouts.pages.contact", compact("recentBlogs"));
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Add IP address
        $data['ip_address'] = $request->ip();

        // Save to database
        ContactUs::create($data);

        // Prepare full name
        $fullName = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));

        // Send email
        Mail::raw(
            "You have received a new contact form message:\n\n" .
            "Name: {$fullName}\n" .
            "Email: {$data['email']}\n" .
            "Phone: " . ($data['phone'] ?? 'N/A') . "\n" .
            "Subject: " . ($data['subject'] ?? 'N/A') . "\n" .
            "Message:\n" . $data['message'],
            function ($mail) use ($data, $fullName) {
                $mail->to('piyushraikwar289@gmail.com')
                    ->subject('New Contact Message from ' . $fullName)
                    ->from($data['email'], $fullName);
            }
        );

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function policy($slug)
    {
        return view("layouts.pages.about");
    }

}
