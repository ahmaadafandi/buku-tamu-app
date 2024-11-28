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
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 190);
            $table->string('nama_aplikasi', 190);
            $table->string('vidio', 190);
            $table->string('background_s1', 190);
            $table->string('background_s2', 190);
            $table->string('background_s3', 190);
            $table->string('background_s4', 190);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
