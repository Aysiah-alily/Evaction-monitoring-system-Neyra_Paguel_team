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
        Schema::create('barangay_evacuees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('center_assignment');
            $table->enum('medical_condition', ['None', 'Hypertension', 'Diabetes', 'Respiratory', 'Pregnant', 'Other'])->default('None');
            $table->enum('status', ['Registered', 'Temporary', 'Transferred'])->default('Registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_evacuees');
    }
};
