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
        //No se va a usar esta iteracion
        Schema::create('ticket_reservations', function (Blueprint $table) {
            $table->id('reservation_id')->unique();
            $table->string('payment_method');
            $table->integer('ticket_quantity');
            $table->timestamp('purchase_date');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('concert_id')->constrained('concerts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_reservations');
    }
};
