<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $bookings = Booking::with(['user', 'mentor', 'jadwalPraktek'])
            ->when($search, function ($query) use ($search) {
                $query->whereRelation('user', 'name', 'like', "%{$search}%")
                      ->orWhereRelation('mentor', 'name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with(['user', 'mentor', 'jadwalPraktek'])->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }


    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}