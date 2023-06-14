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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id()->unique();
            $table->date('date');
            $table->string('uri');
            $table->timestamps();
            $table->foreignId('Ticket_reservationid')->constrained('Ticket_reservations');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
