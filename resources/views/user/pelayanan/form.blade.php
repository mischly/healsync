@extends('layouts.app')

@push('styles')
    @vite(['resources/css/pelayanan/form.css'])
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
            <form action="{{ route('booking.konfirmasi') }}" method="POST">
                @csrf
                <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_user" class="form-label fw-semibold">Nama Anda</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                        <input type="hidden" name="nama_user" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email_user" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        <input type="hidden" name="email_user" value="{{ Auth::user()->email }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone_user" class="form-label fw-semibold">No. HP / WhatsApp</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                    <input type="hidden" name="phone_user" value="{{ Auth::user()->phone }}">
                </div>

                <div class="mb-3">
                    <label for="metode" class="form-label fw-semibold">Metode Konsultasi</label>
                    <select name="metode" class="form-select" required>
                        <option value="">Pilih Metode</option>
                        <option value="online" {{ old('metode') == 'online' ? 'selected' : '' }}>Online</option>
                        <option value="offline" {{ old('metode') == 'offline' ? 'selected' : '' }}>Offline</option>
                    </select>
                    @error('metode')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                        @if(request()->has('tanggal'))
                            <div class="form-control bg-light">{{ request('tanggal') }}</div>
                            <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
                        @else
                            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                        @endif
                        @error('tanggal')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jam" class="form-label fw-semibold">Jam</label>
                        @if(request()->has('jam'))
                            <div class="form-control bg-light">{{ request('jam') }} WIB</div>
                            <input type="hidden" name="jam" value="{{ request('jam') }}">
                        @else
                            <input type="time" name="jam" class="form-control" value="{{ old('jam') }}" required>
                        @endif
                        @error('jam')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="keluhan" class="form-label fw-semibold">Keluhan</label>
                    <textarea name="keluhan" class="form-control" rows="4" required placeholder="Tuliskan keluhan atau topik yang ingin dibahas...">{{ old('keluhan') }}</textarea>
                    @error('keluhan')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary w-100">Konfirmasi Konsultasi!</button>
            </form>
        </div>
    </div>
</div>
@endsection
