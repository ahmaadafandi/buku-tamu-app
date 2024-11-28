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
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('posisi_id');
            $table->string('bidang', 150);
            $table->string('nama', 150);
            $table->string('no_hp', 150);
            $table->string('email')->unique();
            $table->string('instansi_asal', 150);
            $table->text('tujuan');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};
