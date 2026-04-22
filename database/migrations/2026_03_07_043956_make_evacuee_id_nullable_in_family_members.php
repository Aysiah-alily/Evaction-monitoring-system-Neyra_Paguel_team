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
            // Make evacuee_id nullable since family members can be linked to households
           $table->unsignedBigInteger('evacuee_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_members', function (Blueprint $table) {
            // Revert back to not nullable
            $table->unsignedBigInteger('evacuee_id')->nullable(false)->change();
        });
    }
};
