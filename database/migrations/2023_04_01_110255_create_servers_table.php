<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('hdd_id')->constrained('hard_disks')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('ram_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('location_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
