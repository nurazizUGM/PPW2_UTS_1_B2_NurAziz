<?php

use App\Models\Pemain;
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
        Schema::create('pemain', function (Blueprint $table) {
            $table->id();
            // id, nama_pemain, no_punggung, posisi
            $table->string('nama_pemain');
            $table->unsignedInteger('no_punggung');
            $table->enum('posisi', Pemain::$enumPosisi);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemain');
    }
};
