@extends('layouts.app')

@push('styles')
    @vite(['resources/css/mentor/show.css'])
@endpush

@section('content')
@php
    $jadwal = $jadwal ?? null;
@endphp
<div class="container py-5">
    <h2 class="mb-5 fw-bold text-center">Profil Mentor {{ $mentor->nama }}</h2>

    <div class="row">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-4">
                @if($mentor->foto)
                    <img src="{{ asset('storage/' . $mentor->foto) }}"
                        alt="Foto {{ $mentor->nama }}"
                        class="rounded-circle shadow me-4"
                        width="120" height="120">
                @else
                    <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center me-4"
                        style="width:120px;height:120px;font-size:36px;">
                        {{ strtoupper(substr($mentor->nama, 0, 2)) }}
                    </div>
                @endif

                <div>
                    <h4 class="mb-1">{{ $mentor->nama }}</h4>
                    <p class="text-muted">{{ $mentor->bidang }}</p>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($mentor->spesialisasi ?? [] as $tag)
                            <span class="badge bg-light text-dark border">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr>

            <h5 class="fw-bold mt-4 mb-3">Reviews Mentor {{ $mentor->nama }}</h5>
            <div class="d-flex flex-wrap gap-3">
                <div class="card p-3 shadow-sm" style="width: 280px;">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                            style="width:40px;height:40px;">K</div>
                        <div class="text-warning">★★★★★</div>
                    </div>
                    <p class="mb-0 text-sm">Sangat membantu dan membuat saya jadi lebih positif 😊 👍🏻</p>
                </div>
                <div class="card p-3 shadow-sm" style="width: 280px;">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                            style="width:40px;height:40px;">M</div>
                        <div class="text-warning">★★★★★</div>
                    </div>
                    <p class="mb-0 text-sm">Sangat membantu untuk menenangkan diri dan memahami diri sendiri.</p>
                </div>
            </div>

            <h5 class="fw-bold mt-5 mb-3">Tentang Mentor</h5>
            <div class="card p-4 shadow-sm">
                @if($mentor->biodata)
                    <p class="mb-0 text-muted" style="white-space: pre-line;">{{ $mentor->biodata }}</p>
                @else
                    <p class="text-muted fst-italic">Belum ada biodata tersedia.</p>
                @endif
            </div>
        </div>

        {{-- FORM PILIH JADWAL --}}
        <div class="col-md-4">
            <form id="jadwalForm" action="{{ route('booking.form', $mentor->id) }}" method="GET">
                @csrf
                <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                <input type="hidden" id="tanggalTerpilih" name="tanggal" required>
                <input type="hidden" id="jamTerpilih" name="jam" required>

                <div class="card shadow-sm p-4">
                    <h5 class="fw-bold mb-3">Jadwal Praktek</h5>
                    <p class="text-muted">Pilih Tanggal dan Waktu</p>

                    {{-- Tanggal --}}
                    <div class="d-flex gap-2 flex-wrap mb-3">
                        <button type="button" class="btn btn-primary pilih-tanggal active" data-date="2025-07-14">
                            Hari ini<br><small>14 Jul</small>
                        </button>
                        <button type="button" class="btn btn-outline-secondary pilih-tanggal" data-date="2025-07-16">
                            Rabu<br><small>16 Jul</small>
                        </button>
                        <button type="button" class="btn btn-outline-secondary pilih-tanggal" data-date="2025-07-17">
                            Kamis<br><small>17 Jul</small>
                        </button>
                        <button type="button" class="btn btn-outline-secondary pilih-tanggal" data-date="2025-07-19">
                            Sabtu<br><small>19 Jul</small>
                        </button>
                    </div>

                    <hr>

                    {{-- Jam --}}
                    <label class="fw-semibold mb-1">Siang - Sore</label>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <button type="button" class="btn btn-primary pilih-jam active" data-time="14:00">14:00 WIB</button>
                        <button type="button" class="btn btn-outline-secondary pilih-jam" data-time="15:00">15:00 WIB</button>
                        <button type="button" class="btn btn-outline-secondary pilih-jam" data-time="16:00">16:00 WIB</button>
                    </div>

                    <label class="fw-semibold mb-1">Malam</label>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <button type="button" class="btn btn-outline-secondary pilih-jam" data-time="18:00">18:00 WIB</button>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Pilih Jadwal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tanggalButtons = document.querySelectorAll('.pilih-tanggal');
        const jamButtons = document.querySelectorAll('.pilih-jam');
        const inputTanggal = document.getElementById('tanggalTerpilih');
        const inputJam = document.getElementById('jamTerpilih');

        // Set default tanggal & jam dari tombol aktif
        const activeTanggal = document.querySelector('.pilih-tanggal.active');
        if (activeTanggal) inputTanggal.value = activeTanggal.getAttribute('data-date');

        const activeJam = document.querySelector('.pilih-jam.active');
        if (activeJam) inputJam.value = activeJam.getAttribute('data-time');

        tanggalButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                tanggalButtons.forEach(b => b.classList.remove('btn-primary', 'active'));
                tanggalButtons.forEach(b => b.classList.add('btn-outline-secondary'));
                btn.classList.remove('btn-outline-secondary');
                btn.classList.add('btn-primary', 'active');
                inputTanggal.value = btn.getAttribute('data-date');
            });
        });

        jamButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                jamButtons.forEach(b => b.classList.remove('btn-primary', 'active'));
                jamButtons.forEach(b => b.classList.add('btn-outline-secondary'));
                btn.classList.remove('btn-outline-secondary');
                btn.classList.add('btn-primary', 'active');
                inputJam.value = btn.getAttribute('data-time');
            });
        });

        document.getElementById('jadwalForm').addEventListener('submit', function(e) {
            if (!inputTanggal.value || !inputJam.value) {
                e.preventDefault();
                alert('Pilih tanggal dan jam terlebih dahulu.');
            }
        });
    });
</script>
@endpush
