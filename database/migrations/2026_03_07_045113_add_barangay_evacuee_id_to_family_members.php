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
        Schema::table('family_members', function (Blueprint $table) {
            if (!Schema::hasColumn('family_members', 'barangay_evacuee_id')) {
                $table->unsignedBigInteger('barangay_evacuee_id')->nullable()->after('evacuee_id');
                $table->foreign('barangay_evacuee_id')->references('id')->on('barangay_evacuees')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_members', function (Blueprint $table) {
            if (Schema::hasColumn('family_members', 'barangay_evacuee_id')) {
                try {
                    $table->dropForeign(['barangay_evacuee_id']);
                } catch (\Exception $e) {
                    // Foreign key may not exist
                }
                $table->dropColumn('barangay_evacuee_id');
            }
        });
    }
};
