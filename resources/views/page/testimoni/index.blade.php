@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e6f4f9;
    }
    .review-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        width: 300px;
        margin: 10px;
    }
    .review-container {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: center;
        padding-bottom: 20px;
        gap: 20px;
    }
    .review-card img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 12px;
    }
</style>

<div class="container text-center py-5">
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
                <img src="{{ asset('img/testimoniprofil5.jpeg') }}" alt="Yusuf">
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
