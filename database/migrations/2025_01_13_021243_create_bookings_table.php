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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id user');
            $table->foreignId('id jalur');
            $table->integer('harga');
            $table->string('tanggal_naik');
            $table->string('tanggal_turun');
            $table->enum('status', ['Pending', 'Konfirmasi','Tolak']);
            $table->integer('jumlah_pendaki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
