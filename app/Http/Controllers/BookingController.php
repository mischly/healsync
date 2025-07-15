<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'media' => 'required|in:online,offline',
            'organization' => 'nullable|string',
            'referral_source' => 'nullable|string',
        ]);

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'media' => $request->media,
            'organization' => $request->organization,
            'referral_source' => $request->referral_source,
        ]);

        return redirect()->route('booking.success')->with('success', 'Booking berhasil dikirim!');
    }
}
