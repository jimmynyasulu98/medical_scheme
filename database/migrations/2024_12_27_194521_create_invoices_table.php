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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ServiceProvider::class);
            $table->string('number');
            $table->date('date');
            $table->boolean('submitted')->default(false);
            $table->boolean('approved')->default(false);
            $table->boolean('settled')->default(false);
            $table->date('date_recieved')->nullable();
            $table->date('date_paid')->nullable();
            $table->float('total')->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
