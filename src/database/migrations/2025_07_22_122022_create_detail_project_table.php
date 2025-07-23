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
        Schema::create('detail_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); 
            $table->unsignedBigInteger('freelancer_id');
            $table->text('progress_note')->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_project');
    }
};
