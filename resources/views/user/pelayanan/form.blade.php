@extends('layouts.app')

@push('styles')
<style>
    body {
        background-image: linear-gradient(to bottom, #00ebff, #00d4ff, #00bbff, #119fff, #677feb);
    }

    .booking-card {
        max-width: 650px;
        margin: 0 auto;
        border-radius: 1rem;
    }

    .booking-card .form-control,
    .booking-card select,
    .booking-card textarea {
        border-radius: 0.5rem;
    }

    .booking-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 1.5rem;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .booking-body {
        padding: 2rem;
    }

    textarea {
        resize: none;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="card shadow booking-card">
        <div class="booking-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0">Booking Konsultasi</h4>
                    <small class="text-muted">
                        Mentor: <strong>{{ $mentor->nama }}</strong> — Konsultan {{ $mentor->bidang }}
                    </small>
                </div>
                <div>
                    @if($mentor->foto)
                        <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto Mentor" class="avatar-img rounded-circle" width="60" height="60">
                    @else
                        <i class="bi bi-person-circle fs-2 text-secondary"></i>
                    @endif
                </div>
            </div>
        </div>
        <div class="booking-body">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_user" class="form-label fw-semibold">Nama Anda</label>
                        <input type="text" name="nama_user" id="nama_user" class="form-control" value="{{ Auth::user()->name }}" disabled required>
                    </div>
                    <div class="col-md-6">
                        <label for="email_user" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email_user" id="email_user" class="form-control" value="{{ Auth::user()->email }}" disabled required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone_user" class="form-label fw-semibold">No. HP / WhatsApp</label>
                    <input type="text" name="phone_user" id="phone_user" class="form-control" placeholder="Nomor Whatsapp" value="{{ Auth::user()->phone }}" disabled required>
                </div>

                <div class="mb-3">
                    <label for="metode" class="form-label fw-semibold">Metode Konsultasi</label>
                    <select name="metode" class="form-select" required>
                        <option value="">Pilih Metode</option>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required value="{{ request('tanggal') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="jam" class="form-label fw-semibold">Jam</label>
                        <input type="time" name="jam" class="form-control" required value="{{ request('jam') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="keluhan" class="form-label fw-semibold">Keluhan</label>
                    <textarea name="keluhan" class="form-control" rows="4" required placeholder="Tuliskan keluhan atau topik yang ingin dibahas..."></textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100">Kirim Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
