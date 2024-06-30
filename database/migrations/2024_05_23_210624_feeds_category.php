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
        //
        Schema::create('feeds_channels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('publisher_id');
            $table->string('category_image');
            $table->string('category_name'); 
            $table->string('category_description');
            $table->string('category_url');
            $table->string('role')->nullable();
            $table->string('publisher')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('feeds_channel');
    }
};
