<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackgroundCheckRequestForm extends FormRequest
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
            'position_job_title' => 'nullable|string|max:255',
            'candidate_full_name' => 'required|string|max:255',
            'candidate_email' => 'required|email|max:255',
            'candidate_phone' => 'required|string|max:20',
            'background_check_types' => 'nullable|array',
            'background_check_types.*' => 'string|max:255',
            'turnaround_time' => 'required|in:standard,rush',
            'number_of_candidates' => 'required|integer|min:1',
            'file_upload' => 'nullable|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png',
            'notes' => 'nullable|string|max:5000',
        ];
    }
}
