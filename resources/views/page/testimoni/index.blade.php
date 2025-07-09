@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/testimoni.css'])
@endpush

@section('content')
<div class="container text-center" style="padding: 10rem 0">
    <h3 class="mb-3">Dapatkan ketenangan dan konsultasi tanpa judgemental</h3>
    <img src="{{ asset('img/testimonigoogle.png') }}" alt="Google Review" style="height: 60px;" class="mb-4">
    
    <div class="review-container">

        {{-- Testimoni 1 --}}
        <div class="review-card d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('img/testimoniprofil.jpeg') }}" alt="Andini">
                <div>
                    <strong>Andini Permata</strong><br>
                    <span class="text-warning">⭐️⭐️⭐️⭐️⭐️</span>
                </div>
            </div>
            <p>Alhamdulillah ada kenalan terbantu dengan layanan konselingnya. Pengalaman menyenangkan dan tempatnya nyaman.</p>
        </div>

        {{-- Testimoni 2 --}}
        <div class="review-card d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('img/testimoniprofil2.jpg') }}" alt="Anonim">
                <div>
                    <strong>Anonim</strong><br>
                    <span class="text-warning">⭐️⭐️⭐️⭐️</span>
                </div>
            </div>
            <p>Awalnya saya ragu, tapi ternyata ngobrol dengan konselor bikin lega banget. Terima kasih!</p>
        </div>

        {{-- Testimoni 3 --}}
        <div class="review-card d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('img/testimoniprofil3.png') }}" alt="Fajar">
                <div>
                    <strong>Fajar R.</strong><br>
                    <span class="text-warning">⭐️⭐️⭐️⭐️⭐️</span>
                </div>
            </div>
            <p>Sudah 3 kali sesi, dan tiap sesi selalu membawa perubahan positif. Sangat direkomendasikan!</p>
        </div>

        {{-- Testimoni 4 --}}
        <div class="review-card d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('img/testimoniprofil4.jpeg') }}" alt="Rina">
                <div>
                    <strong>Rina Mardiani</strong><br>
                    <span class="text-warning">⭐️⭐️⭐️⭐️⭐️</span>
                </div>
            </div>
            <p>Saya merasa lebih percaya diri setelah sesi konseling. Terima kasih telah menjadi pendengar yang baik.</p>
        </div>

        {{-- Testimoni 5 --}}
        <div class="review-card d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('img/testimoniprofil2.jpg') }}" alt="Yusuf">
                <div>
                    <strong>Yusuf A.</strong><br>
                    <span class="text-warning">⭐️⭐️⭐️⭐️</span>
                </div>
            </div>
            <p>Pelayanan ramah dan tidak menghakimi. Saya merasa sangat didukung selama masa sulit.</p>
        </div>
    </div>
</div>
@endsection
