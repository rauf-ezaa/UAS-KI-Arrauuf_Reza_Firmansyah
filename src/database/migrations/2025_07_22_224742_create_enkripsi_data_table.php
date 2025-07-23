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
        Schema::create('enkripsi_data', function (Blueprint $table) {
            $table->id();
            $table->text('enkripsi_data');
            $table->text('kunci_enkripsi');
            $table->text('dekripsi_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enkripsi_data');
    }
};
