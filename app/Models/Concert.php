<?php

namespace App\Models;

use App\Models\Ticket_reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'concert_name',
        'date',
        'stock',
        'price'
    ];
    public static function getConcerts()
    {
        return self::all();
    }

    public function ticketReservations()
    {
    return $this->hasMany(Ticket_reservation::class, 'concert_id');
    }

}
