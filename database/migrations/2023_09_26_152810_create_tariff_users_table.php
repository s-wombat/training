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
        Schema::create('tariff_users', function (Blueprint $table) {
            $table->id();
            $table->integer('tariff_id')->nullable(false)->default(0);
            $table->integer('user_id')->nullable(false)->default(0);
            $table->string('name', 255)->nullable()->default(null);
            $table->integer('user_ram_mb')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariff_users');
    }
};
