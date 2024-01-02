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
            $table->smallInteger('reference');
            $table->string('date_of_filing');
            $table->string('official_receipt');
            $table->string('complainant');
            $table->string('respondent');
            $table->string('title');
            $table->string('nature');
            $table->string('date_summons');
            $table->string('first_hearing');
            $table->string('final_hearing');
            $table->string('action');
            $table->string('execution');
            $table->string('remark');
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
