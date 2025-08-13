<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');                    // Job title
            $table->string('position');                     // Job position or role
            $table->enum('job_area', [                      // Department/Area
                'Development',
                'Design',
                'HR',
                'Marketing',
                'Sales',
                'Analysis',
                'Finance',
                'Support',
                'Operations',
                'QA',
                'Product'
            ]);
            $table->enum('time', ['Full Time', 'Part Time', 'Internship', 'Contract']);
            $table->enum('job_type', ['Offline', 'Remote', 'Hybrid']); // Added 'Hybrid'

            $table->text('description')->nullable();        // Job description
            $table->string('location')->nullable();         // City or Location
            $table->string('salary')->nullable();           // Salary (can be string like "30k - 50k")
            $table->date('application_deadline')->nullable(); // Deadline to apply
            $table->boolean('is_active')->default(true);    // Status: Active/Inactive    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
