<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Ticket_reservation;
use Dompdf\Dompdf;
class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'pdf_name',
        'path',
        'date',
        'ticket_reservation_id'
    ];
    public static function createWithPDF($reservation_number, $user)
    {
        $domPDF = new Dompdf();
        $reservation = Ticket_reservation::where('reservation_number', $reservation_number)->first();
        $data = [
            'user' => $user,
            'ticket_reservation' => $reservation,
            'date' => date("d-m-Y"),
        ];

        $view_html = view('ticket.pdf', $data)->render();

        $domPDF->loadHtml($view_html);

        $domPDF->setPaper('A4', 'portrait');

        $domPDF->render();

        $filename = 'comprobante-' . $reservation->reservation_number . '.pdf';

        $path = 'pdfs\\' . $filename;
        Storage::disk('public')->put($path, $domPDF->output());

        return static::create([
            'pdf_name' => $filename,
            'path' => $path,
            'ticket_reservation_id' => $reservation->id,
            'date' => date("Y-m-d")
        ]);
    }
}
