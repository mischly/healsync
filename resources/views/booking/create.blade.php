@extends('layouts.app')

@section('title', 'Booking Konseling')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Formulir Klien -->
        <div class="col-md-7 mb-4">
            <p class="text-muted" style="font-size: 0.9rem;">
                Masukan nomor telpon dengan format +62xxxxxxxxxxx <br>
                Isi kolom Organisasi jika Anda dikirim oleh perusahaan / organisasi
            </p>

            <div class="p-2 rounded bg-light small">
                <span class="text-dark">Punya Akun?</span>
                <a href="{{ route('login') }}" class="fw-semibold text-decoration-underline text-dark">Log in</a>
            </div>

            <form id="booking-form" action="{{ route('booking.store') }}" method="POST">
                @csrf

                <div class="row mb-3 mt-3">
                    <div class="col">
                        <label class="form-label">Nama *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon (+62xxxxxxxxx)</label>
                    <input type="tel" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Media Konseling *</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="media" id="mediaOnline" value="online" {{ old('media') === 'online' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="mediaOnline">Online (via aplikasi Healsync)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="media" id="mediaOffline" value="offline" {{ old('media') === 'offline' ? 'checked' : '' }}>
                        <label class="form-check-label" for="mediaOffline">Offline (di lokasi Healsync)</label>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Dari mana Anda mengetahui tentang Healsync?</label>
                    <textarea name="referral_source" class="form-control" rows="2"></textarea>
                </div>
            </form>
        </div>

        <!-- Booking Summary -->
        <div class="col-md-5">
            <div class="p-4 rounded shadow-sm border">
                <h5 class="mb-3 fw-semibold">Rincian Pemesanan</h5>

                <p class="mb-1 fw-semibold">Almira Devina, M.Psi., Psikolog</p>
                <p class="text-muted">July 16, 2025 at 1:00 pm</p>

                <!-- Badge Media -->
                <div class="d-flex gap-2 flex-wrap mb-3">
                    <span class="badge badge-select bg-light border text-dark d-flex align-items-center px-2 py-1" data-media="online" style="cursor:pointer; font-size: 0.8rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-camera-video-fill me-1 text-primary" viewBox="0 0 16 16">
                            <path d="M0 5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v.5l3.553-1.776A.5.5 0 0 1 16 4.118v7.764a.5.5 0 0 1-.447.494L11 10.5V11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5z"/>
                        </svg>
                        Tersedia Online
                    </span>

                    <span class="badge badge-select bg-light border text-dark d-flex align-items-center px-2 py-1" data-media="offline" style="cursor:pointer; font-size: 0.8rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt-fill me-1 text-secondary" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        Tersedia Offline
                    </span>
                </div>

                <!-- Collapse Detail -->
                <button class="btn btn-link p-0 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#details">
                    Lebih Detail
                </button>

                <div class="collapse show" id="details">
                    <div id="mediaDetails"></div>
                </div>

                <hr class="my-2">
                <h6 class="mb-1">Rincian Pembayaran</h6>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <p class="mb-0">Total</p>
                    <p class="fw-bold text-primary">IDR 180,000</p>
                </div>

                <hr class="my-2">
                <a href="#" class="text-decoration-underline small mb-3 d-block">View Policy</a>
                <button type="submit" form="booking-form" class="btn btn-primary w-100">Pesan Sekarang</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- intl-tel-input CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // === Inisialisasi intl-tel-input ===
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            preferredCountries: ["id"],
            initialCountry: "id",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        // Ubah format saat submit
        const form = document.getElementById("booking-form");
        form.addEventListener("submit", function () {
            input.value = iti.getNumber(); // +628xxxxxx
        });

        // === Script Badge Media ===
        const radios = document.querySelectorAll('input[name="media"]');
        const mediaDetails = document.getElementById('mediaDetails');
        const badges = document.querySelectorAll('.badge-select');

        function updateDetails(value) {
            if (value === 'online') {
                mediaDetails.innerHTML = `
                    <strong>Online Session Info:</strong>
                    <p class="text-muted small mb-0">
                        Konsultasi akan dilakukan via aplikasi Healsync.<br>
                        Link dikirimkan ke email 10 menit sebelum sesi.<br>
                        Pastikan koneksi internet stabil dan lingkungan tenang.
                    </p>
                `;
                document.getElementById('mediaOnline').checked = true;
            } else if (value === 'offline') {
                mediaDetails.innerHTML = `
                    <strong>Offline Location:</strong>
                    <p class="mb-1">Healsync Jakarta Counseling Center</p>
                    <p class="text-muted small mb-0">
                        Jl. Damai Sejahtera No. 15, Jakarta Selatan<br>
                        Harap hadir 10 menit sebelum sesi dimulai.<br>
                        Tempat nyaman dan privat disediakan.
                    </p>
                `;
                document.getElementById('mediaOffline').checked = true;
            }
        }

        const selected = document.querySelector('input[name="media"]:checked');
        if (selected) updateDetails(selected.value);

        badges.forEach(badge => {
            badge.addEventListener('click', () => updateDetails(badge.getAttribute('data-media')));
        });

        radios.forEach(radio => {
            radio.addEventListener('change', () => updateDetails(radio.value));
        });
    });
</script>
@endpush
