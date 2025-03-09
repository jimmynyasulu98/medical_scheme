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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('short_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('contact_3')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('email_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
