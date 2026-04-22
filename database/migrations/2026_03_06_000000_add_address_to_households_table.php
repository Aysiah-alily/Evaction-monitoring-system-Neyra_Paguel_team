<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToHouseholdsTable extends Migration
{
    public function up()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->string('barangay_name')->after('purok');
            $table->string('street_name')->after('barangay_name');
            $table->string('house_number')->after('street_name');
        });
    }

    public function down()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->dropColumn(['barangay_name', 'street_name', 'house_number']);
        });
    }
}
