<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrugScreeningRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'contact_person_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'candidate_full_name' => 'required|string|max:255',
            'candidate_email' => 'required|email|max:255',
            'candidate_phone' => 'required|string|max:20',
            'drug_test_type' => 'required|string|max:255',
            'preferred_collection_date_time' => 'nullable|date',
            'preferred_testing_location_city' => 'nullable|string|max:255',
            'preferred_testing_location_zip' => 'nullable|string|max:10',
            'special_instructions' => 'nullable|string|max:2000',
            'notes' => 'nullable|string|max:5000',
        ];
    }
}
