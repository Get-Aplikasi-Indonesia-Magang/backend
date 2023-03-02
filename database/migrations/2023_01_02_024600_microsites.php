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
        $table->bigInteger('id_user')->unsigned()->nullable();
<<<<<<<< HEAD:database/migrations/2023_01_02_024600_microsites.php
        $table->string('icon');
========
        $table->integer('id_content');
        $table->bigInteger('id_video')->unsigned()->nullable();
>>>>>>>> 4378b6a5925e57eb0008bfebc28b1bd8e3dd14c1:database/migrations/2019_11_02_024600_microsites.php
        $table->string('title');
        $table->string('bio');
        $table->string('instagram');
        $table->string('twitter');
        $table->string('facebook');
        $table->string('youtube');
        $table->string('tiktok');
        $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
<<<<<<<< HEAD:database/migrations/2023_01_02_024600_microsites.php
        $table->timestamps();
========
        $table->foreign('id_video')->references('id')->on('video')->onUpdate('cascade')->onDelete('cascade');
>>>>>>>> 4378b6a5925e57eb0008bfebc28b1bd8e3dd14c1:database/migrations/2019_11_02_024600_microsites.php
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
