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
        Schema::create('jenis_kamar', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->id();
    $table->string('nama_jenis')->unique();
    $table->decimal('harga_per_malam', 10, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('jenis_kamar');
    }
};
