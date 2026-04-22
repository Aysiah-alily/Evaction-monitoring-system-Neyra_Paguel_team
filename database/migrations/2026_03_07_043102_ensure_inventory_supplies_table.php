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
        if (!Schema::hasTable('inventory_supplies')) {
            Schema::create('inventory_supplies', function (Blueprint $table) {
                $table->id();
                $table->string('item_name');
                $table->integer('quantity')->default(0);
                $table->string('unit')->nullable();
                $table->enum('status', ['Good', 'Low', 'Critical'])->default('Good');
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_supplies');
    }
};
