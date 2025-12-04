<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BackgroundCheckRequest extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person_name',
        'contact_email',
        'contact_phone',
        'position_job_title',
        'candidate_full_name',
        'candidate_email',
        'candidate_phone',
        'background_check_types',
        'turnaround_time',
        'number_of_candidates',
        'file_upload_path',
        'notes',
    ];

    protected $casts = [
        'background_check_types' => 'array',
    ];
}
