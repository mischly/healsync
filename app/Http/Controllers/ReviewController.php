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
    public function create(Request $request)
    {
        $bookingId = $request->query('booking_id');
        $booking = Booking::with('mentor')->where('id', $bookingId)->where('user_id', auth()->id())->where('status', 'selesai')->firstOrFail();

        return view('review.create', compact('booking'));
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

        $booking = Booking::where('id', $request->booking_id)
            ->where('user_id', auth()->id())
            ->where('status', 'selesai')
            ->firstOrFail();

        $sudahReview = Review::where('booking_id', $booking->id)->exists();
        if ($sudahReview) {
            return back()->with('error', 'Review sudah pernah diberikan untuk sesi ini.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'mentor_id' => $booking->mentor_id,
            'booking_id' => $booking->id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('page.review')->with('success', 'Terima kasih atas ulasannya.');
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
