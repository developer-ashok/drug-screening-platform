<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drug_screening_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('candidate_full_name');
            $table->string('candidate_email');
            $table->string('candidate_phone');
            $table->string('drug_test_type');
            $table->dateTime('preferred_collection_date_time')->nullable();
            $table->string('preferred_testing_location_city')->nullable();
            $table->string('preferred_testing_location_zip')->nullable();
            $table->text('special_instructions')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_screening_requests');
    }
};
