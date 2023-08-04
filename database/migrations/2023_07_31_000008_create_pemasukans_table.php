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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategorimasuk_id');
            $table->foreign('kategorimasuk_id')->references('id')->on('kategorimasuks')->onDelete('cascade')->nullable();
            $table->integer('nominal');
            $table->text('deskripsi');
            $table->dateTime('tanggal_pemasukan');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukans');
    }
};
