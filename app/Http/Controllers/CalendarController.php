<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index() {
        $bookings = Bookings::all();
        foreach ($bookings as $booking) {
            $events[]  = [
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
            ];
        }

        return view('calendar.index', compact('events'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required | date_format:Y-m-d H:i:s',
            'end_date' => 'required | date_format:Y-m-d H:i:s',
        ]);

        $booking = Bookings::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        
        return response()->json($booking);
    }
}
