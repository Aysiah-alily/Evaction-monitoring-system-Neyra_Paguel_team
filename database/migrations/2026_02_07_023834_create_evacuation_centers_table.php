<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evacuation_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->foreignId('barangay_id')->constrained('barangays')->onDelete('cascade');
            $table->integer('capacity')->default(0);
            $table->string('address', 200)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evacuation_centers');
    }
};