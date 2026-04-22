<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barangay_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barangay_id');
            $table->integer('report_count')->default(0);
            $table->timestamps();

            $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('barangay_reports');
    }
};