<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdsTable extends Migration
{
    public function up()
    {
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            
            // Household Information
            $table->string('household_name');
            $table->string('purok');
            
            // Head of Family (Split into 3 fields)
            $table->string('head_surname');
            $table->string('head_firstname');
            $table->string('head_middlename')->nullable();
            
            // Personal Information
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated']);
            $table->integer('age');
            
            // Priority Status
            $table->enum('priority_status', ['High', 'Moderate', 'Low']);
            $table->json('priority_indicator')->nullable(); // Stores array of indicators
            
            // Registration Date
            $table->date('date_registered');
            
            $table->timestamps();
        });

        // Create Family Members Table
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('household_id')->constrained('households')->onDelete('cascade');
            $table->string('name');
            $table->string('relationship');
            $table->integer('age');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('family_members');
        Schema::dropIfExists('households');
    }
}