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
        Schema::create('dependants', function (Blueprint $table) {
            $table->foreignId('principal_member_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('dependant_id')->references('id')->on('users')->cascadeOnDelete();
            $table->primary(['principal_member_id', 'dependant_id']);
            $table->string('relationship');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependants');
    }
};
