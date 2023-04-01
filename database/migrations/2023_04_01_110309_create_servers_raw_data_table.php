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
        Schema::create('servers_raw_data', function (Blueprint $table) {
            $table->id();
            $table->string('model_data');
            $table->string('ram_data');
            $table->string('hdd_data');
            $table->string('location_data');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers_raw_data');
    }
};
