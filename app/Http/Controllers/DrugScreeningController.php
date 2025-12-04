<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrugScreeningRequestForm;
use App\Models\DrugScreeningRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DrugScreeningController extends Controller
{
    public function showForm()
    {
        return view('forms.drug-screening');
    }

    public function submit(DrugScreeningRequestForm $request)
    {
        $data = $request->validated();

        // Create the request
        $drugScreening = DrugScreeningRequest::create([
            'company_name' => $data['company_name'],
            'contact_person_name' => $data['contact_person_name'],
            'contact_email' => $data['contact_email'],
            'contact_phone' => $data['contact_phone'],
            'candidate_full_name' => $data['candidate_full_name'],
            'candidate_email' => $data['candidate_email'],
            'candidate_phone' => $data['candidate_phone'],
            'drug_test_type' => $data['drug_test_type'],
            'preferred_collection_date_time' => $data['preferred_collection_date_time'] ?? null,
            'preferred_testing_location_city' => $data['preferred_testing_location_city'] ?? null,
            'preferred_testing_location_zip' => $data['preferred_testing_location_zip'] ?? null,
            'special_instructions' => $data['special_instructions'] ?? null,
            'notes' => $data['notes'] ?? null,
        ]);

        // Send email notification
        try {
            $adminEmail = config('mail.admin_email', config('mail.from.address'));
            Mail::send('emails.drug-screening-notification', ['request' => $drugScreening], function ($message) use ($drugScreening, $adminEmail) {
                $message->to($adminEmail)
                    ->subject('New Drug Screening Request - ' . $drugScreening->company_name);
            });
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send email notification: ' . $e->getMessage());
        }

        return redirect()->route('drug-screening.form')
            ->with('success', 'Your drug screening request has been submitted successfully. We will contact you shortly.');
    }
}
