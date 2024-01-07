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
        Schema::create('annual', function (Blueprint $table) {
            $table->id();
            $table->string('criminal');
            $table->string('civil');
            $table->string('others');
            $table->double('total');
            $table->string('mediated');
            $table->string('conciliated');
            $table->string('arbitrated');
            $table->double('settled_total');
            $table->string('repudiated');
            $table->string('dismissed');
            $table->string('certified');
            $table->string('pending');
            $table->double('unsettled_total');
            $table->double('estimated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual');
    }
};
