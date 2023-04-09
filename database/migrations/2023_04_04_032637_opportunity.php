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
        Schema::create('opportunity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_role');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('source_url');
            $table->string('tags')->nullable();
            $table->string('region');
            $table->string('country');
            $table->integer('views')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('opportunity');
    }
};
