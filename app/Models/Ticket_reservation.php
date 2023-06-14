<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservation_id',
        'payment_method',
        'ticket_quantity',
        'purchase_date',
        'user_id',
        'concert_id'
    ];
    public function concertDate(){
        return $this->belongsTo(Concert::class,'concert_id');
    }


}
