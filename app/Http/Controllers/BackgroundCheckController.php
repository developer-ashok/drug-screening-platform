<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackgroundCheckRequestForm;
use App\Models\BackgroundCheckRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BackgroundCheckController extends Controller
{
    public function showForm()
    {
        return view('forms.background-check');
    }

    public function submit(BackgroundCheckRequestForm $request)
    {
        $data = $request->validated();
        
        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/background-checks', $fileName, 'public');
        }

        // Store background check types as JSON
        $checkTypes = $request->input('background_check_types', []);

        // Create the request
        $backgroundCheck = BackgroundCheckRequest::create([
            'company_name' => $data['company_name'],
            'contact_person_name' => $data['contact_person_name'],
            'contact_email' => $data['contact_email'],
            'contact_phone' => $data['contact_phone'],
            'position_job_title' => $data['position_job_title'] ?? null,
            'candidate_full_name' => $data['candidate_full_name'],
            'candidate_email' => $data['candidate_email'],
            'candidate_phone' => $data['candidate_phone'],
            'background_check_types' => $checkTypes,
            'turnaround_time' => $data['turnaround_time'],
            'number_of_candidates' => $data['number_of_candidates'],
            'file_upload_path' => $filePath,
            'notes' => $data['notes'] ?? null,
        ]);

        // Send email notification
        try {
            $adminEmail = config('mail.admin_email', config('mail.from.address'));
            Mail::send('emails.background-check-notification', ['request' => $backgroundCheck], function ($message) use ($backgroundCheck, $adminEmail) {
                $message->to($adminEmail)
                    ->subject('New Background Check Request - ' . $backgroundCheck->company_name);
            });
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send email notification: ' . $e->getMessage());
        }

        return redirect()->route('background-check.form')
            ->with('success', 'Your background check request has been submitted successfully. We will contact you shortly.');
    }
}
