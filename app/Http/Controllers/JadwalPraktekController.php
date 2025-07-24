<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\JadwalPraktek;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = JadwalPraktek::with('mentor')->orderBy('mentor_id')->orderBy('hari')->orderBy('jam')->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mentors = Mentor::all();
        return view('admin.jadwal.create', compact('mentors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'jadwals' => 'required|array',
            'jadwals.*.hari' => 'required|string',
            'jadwals.*.jam' => 'required|string',
        ]);

        foreach ($request->jadwals as $jadwal) {
            JadwalPraktek::create([
                'mentor_id' => $request->mentor_id,
                'hari' => strtolower($jadwal['hari']),
                'jam' => $jadwal['jam'],
            ]);
        }

        return redirect()->route('admin.jadwal.index')->with('success', 'Semua jadwal berhasil ditambahkan.');
    }

    public function storeMentor(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'hari' => 'required',
            'jam' => 'required',
        ]);

        JadwalPraktek::create([
            'mentor_id' => $request->mentor_id,
            'hari' => strtolower($request->hari),
            'jam' => $request->jam,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal = JadwalPraktek::findOrFail($id);

        $user = Auth::user();

        if ($user->hasRole('mentor')) {
            $mentor = Mentor::where('user_id', $user->id)->first();
            if ($jadwal->mentor_id !== $mentor->id) {
                abort(403);
            }

            $jadwal->delete();
            return redirect()->route('mentor.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
        }

        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function jadwalTersedia(Request $request)
    {
        $mentorId = $request->mentor_id;
        $tanggal = $request->tanggal;

        $hari = \Carbon\Carbon::parse($tanggal)->locale('id')->isoFormat('dddd');

        $bookedJam = Booking::where('mentor_id', $mentorId)
            ->where('tanggal', $tanggal)
            ->pluck('jam')
            ->toArray();

        $semuaJam = JadwalPraktek::where('mentor_id', $mentorId)
            ->where('hari', strtolower($hari))
            ->pluck('jam')
            ->toArray();

        $tersedia = array_values(array_diff($semuaJam, $bookedJam));

        $formatted = array_map(function ($jam) {
            return \Carbon\Carbon::createFromFormat('H:i:s', $jam)->format('H:i');
        }, $tersedia);

        return response()->json($formatted);
    }

    public function mentorIndex()
    {
        $mentor = Mentor::where('user_id', Auth::id())->firstOrFail();
        $jadwals = JadwalPraktek::where('mentor_id', $mentor->id)->get();

        return view('mentor.jadwal.index', compact('jadwals'));
    }

    public function mentorStore(Request $request)
    {
        $mentor = Mentor::where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'jadwals.*.hari' => 'required|string|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jadwals.*.jam' => 'required|string',
        ]);

        foreach ($request->jadwals as $data) {
            JadwalPraktek::create([
                'mentor_id' => $mentor->id,
                'hari' => $data['hari'],
                'jam' => $data['jam'],
            ]);
        }

        return redirect()->route('mentor.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    
}
