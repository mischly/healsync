<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Mentor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
    public function create($mentorId, Request $request)
    {
        $mentor = Mentor::findOrFail($mentorId);
        $jadwal = null;

        if ($request->filled(['tanggal', 'jam'])) {
            try {
                $jadwal = Carbon::parse("{$request->tanggal} {$request->jam}:00");
            } catch (\Exception $e) {
                $jadwal = null;
            }
        }

        return view('user.pelayanan.form', compact('mentor', 'jadwal'));
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

        $datetime = Carbon::parse("{$request->tanggal} {$request->jam}:00");

        // Cek apakah jadwal sudah dibooking orang lain
        $sudahDipesan = Booking::where('mentor_id', $request->mentor_id)
            ->where('jadwal', $datetime)
            ->exists();

        if ($sudahDipesan) {
            return back()->with('error', 'Slot waktu sudah dipesan. Silakan pilih waktu lain.');
        }

        // Simpan booking
        Booking::create([
            'user_id' => Auth::id(),
            'mentor_id' => $request->mentor_id,
            'metode' => $request->metode,
            'jadwal' => $datetime,
            'keluhan' => $request->keluhan,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Booking berhasil! Tunggu konfirmasi dari psikolog.');
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
