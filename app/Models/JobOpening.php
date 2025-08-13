<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'position',
        'job_area',
        'time',
        'job_type',
        'description',
        'location',
        'salary',
        'application_deadline',
        'is_active',
    ];
}
