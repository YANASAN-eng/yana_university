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
        Schema::create('bgms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_id');
            $table->string('bgm_name');
            $table->string('bgm_url');
            $table->string('bgm_comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bgms');
    }
};
