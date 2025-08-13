<?php
namespace App\Http\Controllers;
use App\Models\AppConfiguration;
use App\Models\Blog;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\Project;
use App\Models\SEO;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Str;
use Validator;
class PublicApiController extends Controller
{
    public function appConfigMetaData()
    {
        $appConfig = AppConfiguration::first([
            'id',
            'app_name',
            'phone',
            'email',
            'address',
            'facebook_link',
            'instagram_link',
            'twitter_link',
            'youtube_link',
            'linkedin_link',
            'whatsapp_link',
            // 'playstore_link',
            // 'appstore_link',
            // 'about',
        ]);
        // Fetch only SEO fields you need
        $seo = SEO::where('page_name', 'home')->first([
            'favicon_icon',
            'meta_title',
            'meta_description',
            'canonical_url',
            'meta_keywords',
            'og_title',
            'og_description',
            'og_type',
            'og_image',
            'og_url',
            'twitter_card',
            'twitter_title',
            'twitter_description',
            'twitter_image',
        ]);
        if (!$appConfig) {
            return response()->json(['message' => 'No App Config Meta Data Found'], 404);
        }
        return response()->json([
            'appConfig' => $appConfig,
            'seo' => $seo,
        ]);
    }

    public function blogData($categorySlug, Request $request)
    {
        // Validate & sanitize 'limit' parameter
        $limit = (int) $request->query('limit', 3);
        $limit = ($limit < 1 || $limit > 20) ? 3 : $limit;

        // Find category by slug (and only if active)
        $category = \App\Models\Category::where('slug', $categorySlug)
            ->where('is_active', 1)
            ->first();

        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        // Fetch blogs for that category
        $blogs = Blog::with('category:id,name')
            ->where('category_id', $category->id)
            ->orderByDesc('id')
            ->limit($limit)
            ->get(['id', 'title', 'image', 'body', 'slug', 'category_id', 'created_at', 'read_time']);

        // Format and return
        $result = $blogs->map(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'body' => $blog->body,
                'image_url' => $blog->image ? asset('storage/' . $blog->image) : null,
                'formatted_date' => $blog->created_at->format('F d, Y'),
                'category' => optional($blog->category)->name ?? 'Uncategorized',
                'read_time' => $blog->read_time ?? '1 min read',
            ];
        });

        return response()->json($result);
    }





    public function buildRecentBlogs()
    {
        return $this->getRecentBlogsByTag('Build');
    }
    public function latestNewsRecentBlogs()
    {
        return $this->getRecentBlogsByTag('Latest News');
    }
    public function thinksRecentBlogs()
    {
        return $this->getRecentBlogsByTag('Thinks');
    }
    public function informationalBlogs()
    {
        return $this->getRecentBlogsByTag('Informational');
    }
    /**
     * Shared logic for tag-based blog filtering
     */
    private function getRecentBlogsByTag(string $tag)
    {
        $blogs = Blog::with('category:id,name')
            ->whereJsonContains('group_tags', $tag)
            ->orderByDesc('id')
            ->limit(9)
            ->get(['id', 'title', 'image', 'slug', 'category_id', 'created_at', 'read_time']);
        // Format data
        $blogs->transform(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'image_url' => $blog->image ? asset('storage/' . $blog->image) : null,
                'formatted_date' => $blog->created_at->format('F d, Y'),
                'category' => $blog->category->name ?? 'Uncategorized',
                'read_time' => $blog->read_time ?? '1 min read',
            ];
        });
        return response()->json($blogs);
    }
    public function blogDetail($slug)
    {
        $blog = Blog::with('category:id,name')
            ->where('is_active', true)
            ->where('slug', $slug)
            ->firstOrFail();
        return response()->json([
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'category' => $blog->category->name ?? 'Uncategorized',
            'image_url' => $blog->image ? asset('storage/' . $blog->image) : null,
            'gallery_images' => collect($blog->gallery_images)->map(fn($img) => asset('storage/' . $img)),
            'video_url' => $blog->video_url,
            'formatted_date' => \Carbon\Carbon::parse($blog->created_at)->format('F d, Y'),
            'read_time' => $blog->read_time ?? '1 min read',
            'body' => $blog->body,
            'meta_title' => $blog->meta_title,
            'meta_description' => $blog->meta_description,
        ]);
    }
    public function projects()
    {
        return response()->json(Project::latest()->get());
    }
    public function testimonials()
    {
        return response()->json(Testimonial::latest()->get());
    }
    public function jobOpening()
    {
        $JobOpenings = JobOpening::where('is_active', true)->latest()->get([
            'id',
            'job_title',
            'position',
            'time',
            'job_type',
            'application_deadline',
            'is_active',
        ]);
        // Format data
        $JobOpenings->transform(function ($JobOpenings_data) {
            return [
                'id' => $JobOpenings_data->id,
                'job_title' => $JobOpenings_data->job_title,
                'position' => $JobOpenings_data->position,
                'time' => $JobOpenings_data->time,
                'job_type' => $JobOpenings_data->job_type,
                'application_deadline' => $JobOpenings_data->application_deadline,
            ];
        });
        return response()->json($JobOpenings);
    }
    public function jobDetail($id)
    {
        $job = JobOpening::where('is_active', true)
            ->where('id', $id)
            ->first([
                'id',
                'job_title',
                'position',
                'time',
                'job_type',
                'application_deadline',
                'description', // add other fields if needed
            ]);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }
        // Format response
        return response()->json([
            'id' => $job->id,
            'job_title' => $job->job_title,
            'position' => $job->position,
            'time' => $job->time,
            'job_type' => $job->job_type,
            'application_deadline' => $job->application_deadline,
            'description' => $job->description, // optional
        ]);
    }
    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_opening_id' => 'required|exists:job_openings,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'resume' => 'nullable|file|mimes:pdf|max:2048',
            // Add all your fields below
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'country' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'leetcode' => 'nullable|url',
            'portfolio_link' => 'nullable|url',
            'personal_website' => 'nullable|url',
            'highest_qualification' => 'nullable|string',
            'university' => 'nullable|string',
            'passing_year' => 'nullable|integer',
            'field_of_study' => 'nullable|string',
            'experience' => 'nullable|string',
            'total_experience_years' => 'nullable|string',
            'current_employer' => 'nullable|string',
            'current_job_title' => 'nullable|string',
            'current_salary' => 'nullable|string',
            'notice_period' => 'nullable|string',
            'skills' => 'nullable|string', // can be comma-separated from frontend
            'projects' => 'nullable|string',
            'certifications' => 'nullable|string',
            'languages_known' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $request->except('resume');
        // Save resume if uploaded
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('resumes', $filename, 'public');
            $data['resume'] = $path;
        }
        $application = JobApplication::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully.',
            'data' => $application,
        ], 201);
    }
}
