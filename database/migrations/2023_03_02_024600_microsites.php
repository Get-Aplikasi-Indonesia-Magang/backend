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
    Schema::create('microsites', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('id_user');
        $table->bigInteger('id_content');
        $table->bigInteger('id_video');
        $table->string('title');
        $table->string('bio');
        $table->string('instagram');
        $table->string('twitter');
        $table->string('facebook');
        $table->string('youtube');
        $table->string('tiktok');
        $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microsites');
    }
};
