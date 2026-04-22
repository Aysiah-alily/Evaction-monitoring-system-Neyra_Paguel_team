<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Skip creation if table exists (or comment out this entire method)
        if (!Schema::hasTable('evacuees')) {
            Schema::create('evacuees', function (Blueprint $table) {
                $table->id();
                $table->string('last_name');
                $table->string('first_name');
                $table->string('middle_name')->nullable();
                $table->string('contact');
                $table->integer('age');
                $table->enum('gender', ['Male', 'Female']);
                $table->string('barangay');
                $table->text('address');
                $table->string('head_of_family');
                $table->string('evac_center');
                $table->date('date_registered')->default(DB::raw('CURRENT_DATE'));
                $table->unsignedBigInteger('family_id')->nullable();
                $table->unsignedBigInteger('calamity_id');
                $table->unsignedBigInteger('evacuation_center_id')->nullable();
                $table->timestamps();

                $table->foreign('calamity_id')->references('id')->on('calamity_types')->onDelete('cascade');
                $table->foreign('evacuation_center_id')->references('id')->on('evacuation_centers')->onDelete('set null');
                // Add foreign key for family_id if applicable
            });
        }
    }

    public function down(): void {
        // Only drop if you want to remove it later
        Schema::dropIfExists('evacuees');
    }
};