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
        Schema::create('izvjestajs', function (Blueprint $table) {
            $table->id();
            $table->longText('opis');
            $table->longText('fajl');
            $table->unsignedBigInteger('user_id'); // dodaj kolonu
            $table->unsignedBigInteger('masina_id')->nullable(); // ili ->unsi
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('masina_id')->references('id')->on('masinas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('izvjestajs');
    }
};
