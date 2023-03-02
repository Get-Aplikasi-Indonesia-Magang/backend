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
        Schema::create('video', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2023_03_01_020048_video.php
            $table->id();
            $table->bigInteger('microsite_id')->nullable()->unsigned();
            $table->string('link');
            $table->timestamps();
            $table->foreign('microsite_id')->references('id')->on('microsites')->onUpdate('cascade')->onDelete('cascade');
=======
            $table->id();       
            $table->string('link');
            $table->timestamps();
>>>>>>> 4378b6a5925e57eb0008bfebc28b1bd8e3dd14c1:database/migrations/2019_11_01_020048_video.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
