<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentor = auth()->user()->mentor ?? Mentor::where('user_id', auth()->id())->first();
        
        if (!$mentor) {
            return redirect()->back()->with('error', 'Mentor tidak ditemukan');
        }

        $bookings = Booking::with(['user'])
            ->where('mentor_id', $mentor->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('mentor.dashboard', compact('bookings'));
    }

    public function selesaikan(Booking $booking)
    {
        $mentor = auth()->user()->mentor ?? Mentor::where('user_id', auth()->id())->first();
        
        if ($booking->mentor_id !== $mentor->id) {
            abort(403);
        }

        $booking->status = 'selesai';
        $booking->save();

        return redirect()->route('mentor.dashboard')->with('success', 'Konsultasi berhasil diselesaikan');
    }
}
