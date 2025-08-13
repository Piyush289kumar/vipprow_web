<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        // Foreign Key
        'job_opening_id',

        // Personal Information
        'full_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'date_of_birth',
        'gender',
        'marital_status',

        // Resume
        'resume',

        // Online Profiles
        'linkedin',
        'github',
        'leetcode',
        'portfolio_link',
        'personal_website',

        // Education & Work
        'highest_qualification',
        'university',
        'passing_year',
        'field_of_study',
        'experience',
        'total_experience_years',
        'current_employer',
        'current_job_title',
        'current_salary',
        'notice_period',

        // Skills & Projects
        'skills',
        'projects',
        'certifications',
        'languages_known',

        // Application Specific
        'cover_letter',
        'additional_info',
        'expected_salary',
        'preferred_job_type',
        'preferred_location',
        'available_from',

        // References
        'reference_name',
        'reference_email',
        'reference_phone',
        'reference_relation',

        // Admin/HR Use
        'status',
        'admin_notes',
        'is_starred',
    ];

    protected $casts = [
        'is_starred' => 'boolean',
        'date_of_birth' => 'date',
        'available_from' => 'date',
        'passing_year' => 'integer',
    ];

    // Relationship with JobOpening
    public function jobOpening()
    {
        return $this->belongsTo(JobOpening::class);
    }

    // Optional: Accessor for full job title
    public function getJobTitleAttribute()
    {
        return $this->jobOpening ? $this->jobOpening->job_title . ' - ' . $this->jobOpening->position : '';
    }
}
