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
        Schema::create('ticket_reservations', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('reservation_number')->unique();
            $table->integer('ticket_quantity');
            $table->string('payment_method');
            $table->integer('total');
            $table->date('purchase_date');
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
