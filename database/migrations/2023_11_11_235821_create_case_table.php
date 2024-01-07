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
        Schema::create('case', function (Blueprint $table) {
            $table->id();
            $table->string('case_number');
            $table->string('reference');
            $table->string('date_of_filing');
            $table->string('official_receipt');
            $table->string('complainant');
            $table->string('complainantAddress');
            $table->string('respondent');
            $table->string('respondentAddress');
            $table->string('title');
            $table->string('nature');
            $table->string('date_summons');
            $table->string('first_hearing');
            $table->string('final_hearing');
            $table->string('action');
            $table->string('date_of_action');
            $table->string('date_of_filing_motion');
            $table->string('date_of_hearing_motion');
            $table->string('date_of_issuance');
            $table->string('date_of_agreement');
            $table->string('execution');
            $table->string('remark');
            $table->string('status');
            $table->longText('location');
            $table->string('locationLatLng');
            $table->string('date_created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case');
    }
};
