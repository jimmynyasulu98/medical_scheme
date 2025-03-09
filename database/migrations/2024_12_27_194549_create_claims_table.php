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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignIdFor(\App\Models\User::class);
            #$table->foreignIdFor(\App\Models\Invoice::class)->cascadeOnDelete();
            $table->foreignId('invoice_id');
            $table->foreign('invoice_id')->on('invoices')->references('id')->cascadeOnDelete();
            $table->float('sub_total')->default(0.00);
            $table->boolean('submitted')->default(false);
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
