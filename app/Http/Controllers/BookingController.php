<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all(); // Ambil semua data jalur
        return view('admin.booking.index', compact('bookings')); // Kirim ke view jalur.index
    }
}
