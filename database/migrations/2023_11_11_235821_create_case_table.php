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
            $table->string('title');
            $table->string('type');
            $table->string('complainantfName');
            $table->string('complainantmName');
            $table->string('complainantlName');
            $table->longText('complainantAddress');
            $table->string('complainantLatLng');
            $table->string('complaintfName');
            $table->string('complaintmName');
            $table->string('complaintlName');
            $table->longText('complaintAddress');
            $table->string('complaintLatLng');
            $table->string('schedule');
            $table->string('status');
            $table->longText('remark');
            $table->longText('location');
            $table->longText('details');
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
