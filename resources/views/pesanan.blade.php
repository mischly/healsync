@extends('layouts.app')

@push('styles')
    @vite(['resources/css/mentor/show.css'])
@endpush

@section('content')
<div class="container py-5">
    <h2 class="mb-5 fw-bold text-center">Profil Psikolog {{ $mentor->nama }}</h2>

    <div class="row">
        {{-- Bagian kiri: Profil --}}
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
                    {{-- Bidang spesialisasi --}}
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($mentor->spesialisasi ?? [] as $tag)
                            <span class="badge bg-light text-dark border">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr>

            {{-- Reviews --}}
            <h5 class="fw-bold mt-4 mb-3">Reviews Psikolog {{ $mentor->nama }}</h5>
            <div class="d-flex flex-wrap gap-3">
                {{-- Contoh 1 --}}
                <div class="card p-3 shadow-sm" style="width: 280px;">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                            style="width:40px;height:40px;">K</div>
                        <div class="text-warning">
                            ★★★★★
                        </div>
                    </div>
                    <p class="mb-0 text-sm">Sangat membantu dan membuat saya jadi lebih positif 😊 👍🏻 Lihat lebih banyak</p>
                </div>

                {{-- Contoh 2 --}}
                <div class="card p-3 shadow-sm" style="width: 280px;">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2"
                            style="width:40px;height:40px;">M</div>
                        <div class="text-warning">
                            ★★★★★
                        </div>
                    </div>
                    <p class="mb-0 text-sm">Sangat membantu untuk menenangkan diri dan memahami diri sendiri. Lihat lebih banyak</p>
                </div>
            </div>
        </div>

        {{-- Bagian kanan: Jadwal --}}
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <h5 class="fw-bold mb-3">Jadwal Praktek</h5>

                <p class="mb-1">Pilih Tanggal dan Waktu</p>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <button class="btn btn-outline-primary active">Hari ini<br><small>14 Jul</small></button>
                    <button class="btn btn-outline-secondary">Rabu<br><small>16 Jul</small></button>
                    <button class="btn btn-outline-secondary">Kamis<br><small>17 Jul</small></button>
                    <button class="btn btn-outline-secondary">Sabtu<br><small>19 Jul</small></button>
                </div>

                <hr>

                <div class="mb-2">
                    <strong>Siang - Sore</strong>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <button class="btn btn-outline-primary">14:00 WIB</button>
                        <button class="btn btn-outline-secondary">15:00 WIB</button>
                        <button class="btn btn-outline-secondary">16:00 WIB</button>
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Malam</strong>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <button class="btn btn-outline-secondary">18:00 WIB</button>
                    </div>
                </div>

                <button class="btn btn-primary w-100">Pilih Jadwal</button>
            </div>
        </div>
    </div>
</div>
@endsection
