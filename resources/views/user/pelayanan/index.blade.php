@extends('layouts.app')

@push('styles')
    @vite('resources/css/pelayanan/index.css')
@endpush

@section('content')
<div class="container pelayanan">
    <div class="judul">
        <h2 class="fw-bold">Mau Mulai Konsultasi?</h2>
        <p class="fw-bold">Yuk Kenali Psikolog Kami!</p>
    </div>

    <div class="card-grid">
        @foreach ($psikologs as $p)
        <div class="card">
            <div class="img-wrapper">
                @if ($p->foto)
                <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto Mentor"
                    class="rounded-circle mb-3" style="object-fit: cover;">
                @else
                    <i class="bi bi-person-circle"></i>
                @endif
            </div>
            <div class="card-content">
                <h3>{{ $p['nama'] }}</h3>
                <p>{{ $p['jenis'] }}</p>
                <div class="buttons">
                    <a href="{{ route('pelayanan.show', $p->id) }}" class="btn btn-primary">Lihat profil</a>
                    <a href="{{ route('booking.form', $p->id) }}" class="btn btn-success">Konsultasi</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
