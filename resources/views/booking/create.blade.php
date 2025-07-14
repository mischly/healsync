@extends('layouts.app')

@section('title', 'Booking Form')

@push('styles')
<link href="{{ asset('css/booking.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.13/build/css/intlTelInput.css">
@endpush

@section('content')
<div class="container py-5">
    <!-- Judul Booking Form -->
    <div class="mb-4 text-center">
        <h2 class="fw-bold">Booking Form</h2>
    </div>

    <!-- Form & Detail Container -->
    <div class="p-4 bg-white rounded shadow-sm" style="border: 1px solid #eaeaea;">
        <div class="row">
            <!-- Kolom Kiri: Form -->
            <div class="col-md-7">
                <div class="mb-2 text-muted small">
                    Masukkan nomor telepon dengan format <strong>+628xxxxxxxxxx</strong><br>
                    Isi kolom Organisasi jika Anda dikirim oleh perusahaan/organisasi
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <div class="info-box mb-3">
                        Punya akun? <a href="#">Log in</a>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Nama *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telepon (+628xxxxxxxxxx)</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="source" class="form-label">Dari mana Anda mengetahui tentang Healsync?</label>
                        <textarea name="source" class="form-control" rows="2"></textarea>
                    </div>
                </form>
            </div>

            <!-- Kolom Kanan: Booking Detail -->
            <div class="col-md-5">
                <div class="border rounded p-4 shadow-sm">
                    <h5 class="fw-bold">Almira Devina, M.Psi., Psikolog</h5>
                    <p class="mb-1 text-muted">July 14, 2025 at 1:00 PM</p>
                    <span class="badge bg-success mb-3">🖥️ Available Online</span>
                    <span class="badge bg-secondary">🏢 Available Offline - Jakarta Office</span>

                    <p class="mb-2">
                        Konsultasi daring di aplikasi Healsync bersama <strong>Almira Devina, M.Psi.</strong>
                    </p>
                    <p class="text-muted small mb-4">Durasi: 1 jam</p>

                    <hr>

                    <h6 class="fw-bold">Payment Details</h6>
                    <p class="mb-0">Total</p>
                    <p class="fw-bold text-primary">IDR 180,000</p>

                    <a href="#" class="text-decoration-underline small">View Policy</a>

                    <!-- Tombol Submit -->
                    <div class="mt-4">
                        <button type="submit" form="bookingForm" class="btn btn-primary w-100">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.13/build/js/intlTelInput.min.js"></script>
<script>
    const phoneInputField = document.querySelector("#phone");

    if (phoneInputField) {
        const iti = window.intlTelInput(phoneInputField, {
            initialCountry: "id",
            preferredCountries: ["id", "us", "sg", "my"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.13/build/js/utils.js",
            separateDialCode: true,
        });

        document.querySelector("#bookingForm").addEventListener("submit", function(e) {
            if (!iti.isValidNumber()) {
                e.preventDefault();
                const errorCode = iti.getValidationError();
                let message = "Nomor telepon tidak valid.";

                if (errorCode === 1) message = "Nomor terlalu pendek.";
                else if (errorCode === 2) message = "Nomor terlalu panjang.";
                else if (errorCode === 3) message = "Format nomor tidak valid.";

                alert("⚠️ " + message + " Pastikan memakai format seperti: +6281234567890");
                phoneInputField.focus();
            } else {
                phoneInputField.value = iti.getNumber();
            }
        });
    }
</script>
@endpush
