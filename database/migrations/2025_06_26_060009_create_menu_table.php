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
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('title', 100);
            $table->integer('parent_id')->default(0);
            $table->string('icon', 100)->nullable();
            $table->string('link', 100)->nullable();
            $table->unique('link', 'linknya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
