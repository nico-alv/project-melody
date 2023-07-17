<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\TicketReservationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'password',
        'email',
        'role'
    ];

    public function concertsClient()
    {
        return $this->hasMany(Ticket_reservation::class, 'user_id')->orderBy('purchase_date', 'desc');
    }
}
