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
        Schema::create('card_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('card_number',100);
            $table->dateTime('enter_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_logs');
    }
};
