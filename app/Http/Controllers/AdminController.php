<?php

namespace App\Http\Controllers;

use App\Models\BackgroundCheckRequest;
use App\Models\DrugScreeningRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $backgroundChecks = BackgroundCheckRequest::latest()->paginate(10);
        $drugScreenings = DrugScreeningRequest::latest()->paginate(10);
        
        return view('admin.dashboard', compact('backgroundChecks', 'drugScreenings'));
    }

    public function backgroundChecks()
    {
        $requests = BackgroundCheckRequest::latest()->paginate(20);
        return view('admin.background-checks', compact('requests'));
    }

    public function drugScreenings()
    {
        $requests = DrugScreeningRequest::latest()->paginate(20);
        return view('admin.drug-screenings', compact('requests'));
    }

    public function exportBackgroundChecks()
    {
        $requests = BackgroundCheckRequest::all();
        
        $filename = 'background_checks_' . date('Y-m-d_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($requests) {
            $file = fopen('php://output', 'w');
            
            // Header row
            fputcsv($file, [
                'ID', 'Company Name', 'Contact Person', 'Contact Email', 'Contact Phone',
                'Position/Job Title', 'Candidate Name', 'Candidate Email', 'Candidate Phone',
                'Check Types', 'Turnaround Time', 'Number of Candidates', 'Notes', 'Submitted At'
            ]);

            // Data rows
            foreach ($requests as $request) {
                fputcsv($file, [
                    $request->id,
                    $request->company_name,
                    $request->contact_person_name,
                    $request->contact_email,
                    $request->contact_phone,
                    $request->position_job_title,
                    $request->candidate_full_name,
                    $request->candidate_email,
                    $request->candidate_phone,
                    is_array($request->background_check_types) ? implode(', ', $request->background_check_types) : '',
                    $request->turnaround_time,
                    $request->number_of_candidates,
                    $request->notes,
                    $request->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportDrugScreenings()
    {
        $requests = DrugScreeningRequest::all();
        
        $filename = 'drug_screenings_' . date('Y-m-d_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($requests) {
            $file = fopen('php://output', 'w');
            
            // Header row
            fputcsv($file, [
                'ID', 'Company Name', 'Contact Person', 'Contact Email', 'Contact Phone',
                'Candidate Name', 'Candidate Email', 'Candidate Phone', 'Drug Test Type',
                'Preferred Collection Date/Time', 'Testing Location City', 'Testing Location Zip',
                'Special Instructions', 'Notes', 'Submitted At'
            ]);

            // Data rows
            foreach ($requests as $request) {
                fputcsv($file, [
                    $request->id,
                    $request->company_name,
                    $request->contact_person_name,
                    $request->contact_email,
                    $request->contact_phone,
                    $request->candidate_full_name,
                    $request->candidate_email,
                    $request->candidate_phone,
                    $request->drug_test_type,
                    $request->preferred_collection_date_time ? $request->preferred_collection_date_time->format('Y-m-d H:i:s') : '',
                    $request->preferred_testing_location_city,
                    $request->preferred_testing_location_zip,
                    $request->special_instructions,
                    $request->notes,
                    $request->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
