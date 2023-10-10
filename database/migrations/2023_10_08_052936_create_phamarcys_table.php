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
        Schema::create('phamarcys', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('banner_cover')->nullable();
            $table->string('address')->nullable();
            $table->string('about')->nullable();
            $table->text('infor')->nullable();
            $table->string('hotline', 20)->nullable();
            $table->integer('status');
            $table->string('certificate_file');
            $table->integer('rate_start');
            $table->integer('view');
            $table->integer('favorite');
            $table->integer('like');
            $table->string('time_open', 20)->nullable();
            $table->string('time_close', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phamarcys');
    }
};
