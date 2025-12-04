<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
        }
        .info-row {
            margin-bottom: 10px;
            padding: 8px;
            background-color: white;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 180px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Drug Screening Request</h2>
        </div>
        <div class="content">
            <p>A new drug screening request has been submitted:</p>
            
            <h3>Company Information</h3>
            <div class="info-row">
                <span class="label">Company Name:</span>
                <span>{{ $request->company_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Contact Person:</span>
                <span>{{ $request->contact_person_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Contact Email:</span>
                <span>{{ $request->contact_email }}</span>
            </div>
            <div class="info-row">
                <span class="label">Contact Phone:</span>
                <span>{{ $request->contact_phone }}</span>
            </div>
            
            <h3>Candidate Information</h3>
            <div class="info-row">
                <span class="label">Candidate Name:</span>
                <span>{{ $request->candidate_full_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Candidate Email:</span>
                <span>{{ $request->candidate_email }}</span>
            </div>
            <div class="info-row">
                <span class="label">Candidate Phone:</span>
                <span>{{ $request->candidate_phone }}</span>
            </div>
            
            <h3>Screening Details</h3>
            <div class="info-row">
                <span class="label">Drug Test Type:</span>
                <span>{{ $request->drug_test_type }}</span>
            </div>
            @if($request->preferred_collection_date_time)
            <div class="info-row">
                <span class="label">Preferred Collection:</span>
                <span>{{ $request->preferred_collection_date_time->format('F d, Y H:i') }}</span>
            </div>
            @endif
            @if($request->preferred_testing_location_city || $request->preferred_testing_location_zip)
            <div class="info-row">
                <span class="label">Testing Location:</span>
                <span>
                    {{ $request->preferred_testing_location_city }}{{ $request->preferred_testing_location_city && $request->preferred_testing_location_zip ? ', ' : '' }}{{ $request->preferred_testing_location_zip }}
                </span>
            </div>
            @endif
            @if($request->special_instructions)
            <div class="info-row">
                <span class="label">Special Instructions:</span>
                <span>{{ $request->special_instructions }}</span>
            </div>
            @endif
            @if($request->notes)
            <div class="info-row">
                <span class="label">Notes:</span>
                <span>{{ $request->notes }}</span>
            </div>
            @endif
            
            <div class="info-row">
                <span class="label">Submitted:</span>
                <span>{{ $request->created_at->format('F d, Y H:i:s') }}</span>
            </div>
            
            <p style="margin-top: 20px;">
                <strong>Request ID:</strong> #{{ $request->id }}
            </p>
        </div>
    </div>
</body>
</html>

