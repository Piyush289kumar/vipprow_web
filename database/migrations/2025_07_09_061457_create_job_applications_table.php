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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            // Job reference
            $table->foreignId('job_opening_id')
                ->constrained('job_openings')
                ->onDelete('cascade');

            // Personal Information
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable(); // Male, Female, Other, Prefer not to say
            $table->string('marital_status')->nullable(); // Single, Married, etc.

            // Resume File Upload
            $table->string('resume')->nullable(); // File path

            // Online Profiles
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('leetcode')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->string('personal_website')->nullable();

            // Education & Work
            $table->string('highest_qualification')->nullable();
            $table->string('university')->nullable();
            $table->year('passing_year')->nullable();
            $table->string('field_of_study')->nullable();
            $table->text('experience')->nullable();
            $table->string('total_experience_years')->nullable();
            $table->string('current_employer')->nullable();
            $table->string('current_job_title')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('notice_period')->nullable(); // e.g., Immediate, 15 days, 30 days

            // Skills & Projects
            $table->text('skills')->nullable(); // Tags or JSON
            $table->text('projects')->nullable();
            $table->text('certifications')->nullable(); // JSON or comma-separated
            $table->string('languages_known')->nullable(); // English, Hindi, etc.

            // Application Specific
            $table->text('cover_letter')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('preferred_job_type')->nullable(); // Remote, On-site, Hybrid
            $table->string('preferred_location')->nullable();
            $table->date('available_from')->nullable();

            // References
            $table->string('reference_name')->nullable();
            $table->string('reference_email')->nullable();
            $table->string('reference_phone')->nullable();
            $table->string('reference_relation')->nullable();

            // Admin/HR Use
            $table->enum('status', ['Pending', 'Reviewed', 'Shortlisted', 'Rejected', 'Hired'])->default('Pending');
            $table->text('admin_notes')->nullable();
            $table->boolean('is_starred')->default(false); // Marked by HR
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
