<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        if ($booking->status !== 'selesai' || $booking->review) {
            return redirect()->route('user.profile')->with('error', 'Anda tidak dapat memberikan review untuk booking ini.');
        }

        return view('user.review.create', compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ]);

        $booking = Booking::with('mentor')->where('user_id', auth()->id())->findOrFail($request->booking_id);

        if ($booking->status !== 'selesai' || $booking->review) {
            return redirect()->route('user.profile')->with('error', 'Review tidak valid.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'mentor_id' => $booking->mentor_id,
            'booking_id' => $booking->id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('user.profile')->with('success', 'Review berhasil dikirim.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
