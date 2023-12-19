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
        Schema::create('record_of_savings', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_amount',10,2);
            $table->date('date');
            $table->bigInteger('deposit')->unsigned();
            $table->foreign('deposit')->references('id')->on('monthly_incomes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_of_savings');
    }
};
