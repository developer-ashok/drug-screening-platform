<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugScreeningRequest extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person_name',
        'contact_email',
        'contact_phone',
        'candidate_full_name',
        'candidate_email',
        'candidate_phone',
        'drug_test_type',
        'preferred_collection_date_time',
        'preferred_testing_location_city',
        'preferred_testing_location_zip',
        'special_instructions',
        'notes',
    ];

    protected $casts = [
        'preferred_collection_date_time' => 'datetime',
    ];
}
