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
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap');
            $table->string('namabaptis')->nullable();
            $table->string('notelp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('jekel', ['L', 'P']); // Laki-laki / Perempuan
            $table->string('tempatlahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
