<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop the old enum and create a new one with all roles
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'evacuation_admin', 'barangay_admin', 'user') DEFAULT 'user'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'user') DEFAULT 'user'");
    }
};