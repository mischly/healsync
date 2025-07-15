@extends('layouts.app')

@push('styles')
<style>
    body {
        background-image: linear-gradient(to bottom, #00ebff, #00d4ff, #00bbff, #119fff, #677feb);
    }
</style>
@endpush

@section('content')
@php
\Carbon\Carbon::setLocale('id');
@endphp
<div class="container py-5">
    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-header bg-light">
            <h4 class="mb-0">Konfirmasi Konsultasi</h4>
        </div>
        <div class="card-body">
            <div class="mb-3 text-center">
                @if($mentor->foto)
                    <img src="{{ asset('storage/' . $mentor->foto) }}" class="rounded-circle mb-2" width="80" height="80">
                @endif
                <h5>{{ $mentor->nama }}</h5>
                <p class="text-muted">{{ $mentor->bidang }}</p>
            </div>

            <ul class="list-group mb-4">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Metode</span>
                    <strong>{{ ucfirst($metode) }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tanggal & Jam</span>
                    <strong>{{ $jadwal->translatedFormat('l, d F Y') }} Pukul {{ $jadwal->translatedFormat('H:i') }} WIB</strong>
                </li>
                <li class="list-group-item">
                    <span class="fw-semibold">Keluhan</span><br>
                    <span>{{ $keluhan }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Harga Konsultasi</span>
                    <strong class="text-success">Rp{{ number_format($harga, 0, ',', '.') }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <span class="text-muted">Pembayaran</span>
                    <strong class="text-primary">Bayar setelah sesi konseling</strong>
                </li>
            </ul>

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                <input type="hidden" name="metode" value="{{ $metode }}">
                <input type="hidden" name="tanggal" value="{{ $jadwal->toDateString() }}">
                <input type="hidden" name="jam" value="{{ $jadwal->format('H:i') }}">
                <input type="hidden" name="keluhan" value="{{ $keluhan }}">

                <button type="submit" class="btn btn-outline-primary w-100">Booking Sekarang</button>
            </form>
        </div>
    </div>
</div>
@endsection
