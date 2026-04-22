<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('puroks', function (Blueprint $table) {
            $table->id();
            $table->string('barangay_name');
            $table->string('purok_name');
            $table->string('captain_name');
            $table->integer('household_count');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puroks');
    }
};