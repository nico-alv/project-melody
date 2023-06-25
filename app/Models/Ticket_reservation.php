<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'reservation_number',
        'ticket_quantity',
        'payment_method',
        'total',
        'purchase_date',
        'user_id',
        'concert_id'
    ];
    public function concertDate()
    {
        return $this->belongsTo(Concert::class, 'concert_id');
    }
    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'ticket_reservation_id');
    }
}
