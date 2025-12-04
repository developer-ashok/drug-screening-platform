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
        Schema::create('background_check_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('position_job_title')->nullable();
            $table->string('candidate_full_name');
            $table->string('candidate_email');
            $table->string('candidate_phone');
            $table->json('background_check_types')->nullable(); // Array of selected check types
            $table->enum('turnaround_time', ['standard', 'rush'])->default('standard');
            $table->integer('number_of_candidates')->default(1);
            $table->string('file_upload_path')->nullable(); // Path to uploaded file
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('background_check_requests');
    }
};
