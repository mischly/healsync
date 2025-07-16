@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
<style>
    body {
        background: #7F7FD5;
        background: linear-gradient(to bottom left, #91EAE4, #86A8E7, #7F7FD5);
        min-height: 100vh;
    }

    .container-detail {
        padding-top: 6rem;
    }

    .card-detail {
        background-color: #ffffff;
    }
</style>
@endpush

@section('content')
<div class="container container-detail">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm card-detail">
                <div class="card-body">
                    <h5 class="mb-4">Detail Booking Konsultasi</h5>

                    <div class="mb-3">
                        <strong>Mentor:</strong> {{ $booking->mentor->nama ?? '-' }}
                    </div>

                    <div class="mb-3">
                        <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('l, d F Y') }}
                    </div>

                    <div class="mb-3">
                        <strong>Jam:</strong> {{ \Carbon\Carbon::parse($booking->jam)->format('H:i') }}
                    </div>

                    <div class="mb-3">
                        <strong>Metode:</strong> {{ ucfirst($booking->metode) }}
                    </div>

                    <div class="mb-3">
                        <strong>Keluhan:</strong>
                        <div class="border p-2 rounded mt-1">
                            {{ $booking->keluhan }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Status:</strong>
                        @if($booking->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @elseif($booking->status == 'dibatalkan')
                            <span class="badge bg-danger">Dibatalkan</span>
                        @else
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @endif
                    </div>

                    @if($booking->status === 'selesai' && !$booking->review)
                        <div class="mt-4">  
                            <a href="{{ route('reviews.create', ['booking' => $booking->id]) }}" class="btn btn-primary">
                                Beri Review ke Mentor
                            </a>
                        </div>
                    @elseif($booking->review)
                        <div class="mt-4">
                            <p class="text-success">Anda sudah memberikan review untuk konsultasi ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
