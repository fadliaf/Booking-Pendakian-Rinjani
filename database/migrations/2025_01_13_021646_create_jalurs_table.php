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
        Schema::create('jalurs', function (Blueprint $table) {
            $table->id();
            $table->enum('nama_jalur', ['Sembalun', 'Senaru', 'Aik Berik','Timbanuah','Tete Batu','Torean']);
            $table->date('tanggal');
            $table->integer('jumlah_kuota');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalurs');
    }
};
