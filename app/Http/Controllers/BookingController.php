<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'organization' => 'nullable|string',
            'source' => 'nullable|string',
        ]);

        Booking::create($request->all());

        return redirect()->back()->with('success', 'Booking berhasil disimpan.');
    }
}
