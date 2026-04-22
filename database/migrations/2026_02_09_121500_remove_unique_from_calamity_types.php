<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueFromCalamityTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('calamity_types', function (Blueprint $table) {
            // drop the unique index on `name`
            $table->dropUnique('calamity_types_name_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('calamity_types', function (Blueprint $table) {
            // restore the unique index if rolling back
            $table->unique('name', 'calamity_types_name_unique');
        });
    }
}
