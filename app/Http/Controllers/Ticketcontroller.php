<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Ticket;
use App\Models\Ticket_reservation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
