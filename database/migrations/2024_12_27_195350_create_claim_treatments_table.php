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
        Schema::create('claim_treatments', function (Blueprint $table) {
            $table->id();
            #$table->foreignIdFor(\App\Models\Claim::class);
            $table->foreignId('claim_id');
            $table->foreign('claim_id')->on('claims')->references('id')->cascadeOnDelete();
            $table->string('treatment_type')->nullable();
            $table->string('description')->nullable();
            $table->float('charge')->default(0.00);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_treatments');
    }
};
