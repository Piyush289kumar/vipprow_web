<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('s_e_o_s', function (Blueprint $table) {
            $table->id();
            // Basic Page Info
            $table->string('page_name')->unique(); // like: home, about, contact, etc.
            $table->string('route_name')->nullable(); // optional Laravel route reference
            $table->string('locale')->default('en'); // for multilingual SEO
            $table->string('favicon_icon')->nullable();

            // Meta Tags
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('meta_keywords')->nullable();

            // Open Graph (OG)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_type')->default('website'); // e.g., article, video, product
            $table->string('og_image')->nullable();
            $table->string('og_url')->nullable(); // for custom OG URL

            // Twitter Card
            $table->string('twitter_card')->default('summary_large_image'); // summary, summary_large_image
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Additional Control
            $table->boolean('no_index')->default(false);
            $table->boolean('no_follow')->default(false);
            $table->json('custom_meta')->nullable(); // for arbitrary meta tags (like <meta name="robots" content="noarchive">)
            $table->json('schema_markup')->nullable(); // JSON-LD for rich snippets

            // Sitemap/priority control
            $table->boolean('include_in_sitemap')->default(true);
            $table->decimal('priority', 2, 1)->default(0.5); // Sitemap priority (0.0 - 1.0)
            $table->string('change_frequency')->default('monthly'); // daily, weekly, monthly

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_e_o_s');
    }
};
