<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\JadwalPraktek;
use App\Models\Mentor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($mentorId, Request $request)
    {
        $mentor = Mentor::findOrFail($mentorId);
        $jadwal = null;

        if ($request->filled(['tanggal', 'jam'])) {
            try {
                $jadwal = \Carbon\Carbon::parse("{$request->tanggal} {$request->jam}:00");
            } catch (\Exception $e) {
                $jadwal = null;
            }
        }

        $slots = config('slots');

        $tanggalList = collect(range(0, 6))->map(function ($i) {
            $tanggal = now()->addDays($i);
            return [
                'tanggal' => $tanggal->toDateString(),
                'hari' => $i === 0 ? 'Hari ini' : $tanggal->translatedFormat('l'),
                'short' => $tanggal->translatedFormat('d M'),
            ];
        })->take(4);

        return view('user.pelayanan.form', compact('mentor', 'jadwal', 'slots', 'tanggalList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'metode' => 'required|in:online,offline',
            'tanggal' => 'required|date',
            'jam' => 'required|regex:/^\d{2}:\d{2}$/',
            'keluhan' => 'required|string|min:10',
        ]);

        $sudahDipesan = Booking::where('mentor_id', $request->mentor_id)
            ->where('tanggal', $request->tanggal)
            ->where('jam', $request->jam)
            ->exists();

        if ($sudahDipesan) {
            return back()->with('error', 'Jadwal sudah dipesan. Silakan pilih waktu lain.');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'mentor_id' => $request->mentor_id,
            'metode' => $request->metode,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keluhan' => $request->keluhan,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.complete', ['mentor_id' => $request->mentor_id]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with(['mentor', 'review'])->where('user_id', Auth::id())->findOrFail($id);
        return view('profile.show', compact('booking'));
    }

    public function konfirmasi(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'metode' => 'required|in:online,offline',
            'tanggal' => 'required|date',
            'jam' => 'required|regex:/^\d{2}:\d{2}$/',
            'keluhan' => 'required|string|min:10',
        ]);

        $mentor = Mentor::findOrFail($request->mentor_id);
        $datetime = Carbon::parse("{$request->tanggal} {$request->jam}:00");

        $harga = $mentor->harga ?? 250000;

        return view('user.pelayanan.konfirmasi', [
            'mentor' => $mentor,
            'jadwal' => $datetime,
            'metode' => $request->metode,
            'keluhan' => $request->keluhan,
            'harga' => $harga,
        ]);
    }

    public function complete($mentor_id)
    {
        $mentor = Mentor::findOrFail($mentor_id);
        return view('user.pelayanan.complete', compact('mentor'));
    }
}
