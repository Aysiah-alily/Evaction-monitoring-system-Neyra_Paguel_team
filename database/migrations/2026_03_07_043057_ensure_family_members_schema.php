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
            // Add foreign key if evacuee_id doesn't exist
            if (!Schema::hasColumn('family_members', 'evacuee_id')) {
                $table->unsignedBigInteger('evacuee_id')->after('id');
            }
            
            // Add other required columns if they don't exist
            if (!Schema::hasColumn('family_members', 'name')) {
                $table->string('name');
            }
            
            if (!Schema::hasColumn('family_members', 'relationship')) {
                $table->enum('relationship', ['Spouse', 'Child', 'Parent', 'Sibling', 'Grandchild', 'Other']);
            }
            
            if (!Schema::hasColumn('family_members', 'age')) {
                $table->integer('age')->nullable();
            }
            
            if (!Schema::hasColumn('family_members', 'medical_condition')) {
                $table->enum('medical_condition', ['None', 'Hypertension', 'Diabetes', 'Respiratory', 'Pregnant', 'Other'])->default('None');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_members', function (Blueprint $table) {
            // Drop columns if they exist
            if (Schema::hasColumn('family_members', 'evacuee_id')) {
                try {
                    $table->dropForeign(['evacuee_id']);
                } catch (\Exception $e) {
                    // Foreign key may not exist
                }
                $table->dropColumn('evacuee_id');
            }
            if (Schema::hasColumn('family_members', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('family_members', 'relationship')) {
                $table->dropColumn('relationship');
            }
            if (Schema::hasColumn('family_members', 'age')) {
                $table->dropColumn('age');
            }
            if (Schema::hasColumn('family_members', 'medical_condition')) {
                $table->dropColumn('medical_condition');
            }
        });
    }
};
