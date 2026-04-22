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
        Schema::table('barangay_evacuees', function (Blueprint $table) {
            $table->string('purok')->nullable()->after('center_assignment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangay_evacuees', function (Blueprint $table) {
            $table->dropColumn('purok');
        });
    }
};
