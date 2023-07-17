<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Ticket;
use App\Models\Concert;
use App\Models\Ticket_reservation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function pdf()
    {
        $dompdf = new Dompdf();
        $view_html = view('example_pdf');
        $dompdf->loadHtml($view_html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream();
    }

    public function downloadPDF($id)
    {
        $pdf = Ticket::findOrFail($id);
        $path = storage_path('app\public\pdfs\\' . $pdf->pdf_name);
        $filename = $pdf->pdf_name;
        $mimeType = Storage::mimeType($path);
        return response()->download($path, $filename, ['Content-Type' => $mimeType]);
    }

    public function generatePDF($id_reservation)
    {
        $user = auth()->user();
        $reservation = Ticket_reservation::findOrFail($id_reservation);
        $domPDF = new Dompdf();
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

        $ticket = Ticket::create([
            'pdf_name' => $filename,
            'path' => $path,
            'ticket_reservation_id' => $id_reservation,
            'date' => date("Y-m-d")
        ]);

        return view('client.order_success', [
            'ticket_reservation' => $reservation,
            'ticket' => $ticket
        ]);
    }

    public function showCollection()
{
    $ventasPorMetodoPago = Ticket_reservation::select('payment_method')
        ->selectRaw('SUM(total) as total')
        ->groupBy('payment_method')
        ->get();

    $ventasPorcentaje = Ticket_reservation::select('payment_method')
        ->selectRaw('SUM(total) as total, SUM(total) / (SELECT SUM(total) FROM ticket_reservations) * 100 as porcentaje')
        ->groupBy('payment_method')
        ->get();

    $totalVendidoPorConcierto = Ticket_reservation::select('concerts.concert_name as concert_name')
        ->selectRaw('SUM(ticket_reservations.total) as total')
        ->join('concerts', 'concerts.id', '=', 'ticket_reservations.concert_id')
        ->groupBy('concerts.concert_name')
        ->get();

    $conciertos = Concert::select('concert_name')->get()->pluck('concert_name')->toArray();
    $conciertosConVentas = $totalVendidoPorConcierto->pluck('concert_name')->toArray();
    $conciertosSinVentas = array_diff($conciertos, $conciertosConVentas);
    $metodosDePago = ['Efectivo', 'Transferencia', 'Tarjeta de débito', 'Tarjeta de crédito']; // Actualizar esto con tus métodos de pago reales
    $metodosDePagoSinVentas = $ventasPorMetodoPago->pluck('payment_method')->toArray();
    $metodosDePagoSinVentas = array_diff($metodosDePago, $metodosDePagoSinVentas);

    return view('admin.collection', [
        'ventasPorMetodoPago' => $ventasPorMetodoPago,
        'ventasPorcentaje' => $ventasPorcentaje,
        'totalVendidoPorConcierto' => $totalVendidoPorConcierto,
        'conciertosSinVentas' => $conciertosSinVentas,
        'metodosDePagoSinVentas' => $metodosDePagoSinVentas,
    ]);
}
}
