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
        Schema::table('detail_project', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('freelancer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_project', function (Blueprint $table) {
            //
        });
    }
};
