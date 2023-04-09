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
        Schema::create('company_directory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_role');
            $table->string('company_logo');
            $table->string('company_name');
            $table->text('about_company')->nullable();
            $table->string('company_url');
            $table->string('career_url');
            $table->string('company_email');
            $table->string('company_location');
            $table->string('industry');
            $table->string('region');
            $table->string('country');
            $table->timestamps();
            $table->tinyInteger('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('company_directory');
    }
};
