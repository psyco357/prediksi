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
        Schema::create('persembahan', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('member_id');
            $table->string('namalengkap'); // nama pemberi (boleh redundant jika bukan member)
            $table->string('namabaptis')->nullable();
            $table->decimal('nominal', 15, 2);
            $table->unsignedBigInteger('jenis_persembahan_id');
            $table->string('bukti_bayar')->nullable(); // path bukti bayar
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();

            // Foreign Keys
            // $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade');
            $table->foreign('jenis_persembahan_id')->references('id')->on('jenispersembahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persembahan');
    }
};
