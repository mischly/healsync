@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
<style>
    body {
        background: linear-gradient(to bottom left, #91EAE4, #86A8E7, #7F7FD5);
        min-height: 100vh;
    }

    .review-container {
        padding-top: 6rem;
    }

    .review-card {
        background-color: #fff;
        border-radius: 0.75rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        padding: 2rem;
    }

    .review-card h5 {
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        border-radius: 0.5rem;
    }

    textarea.form-control {
        resize: none;
        min-height: 120px;
    }

    .btn-primary {
        border-radius: 0.5rem;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
</style>
@endpush

@section('content')
<div class="container review-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="review-card">
                <h5>Beri Ulasan untuk Mentor</h5>

                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf

                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                    <input type="hidden" name="mentor_id" value="{{ $booking->mentor_id }}">

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-select" required>
                            <option value="">Pilih rating</option>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }} bintang</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="komentar" class="form-label">Komentar (opsional)</label>
                        <textarea name="komentar" id="komentar" class="form-control" placeholder="Tulis kesan atau saran...">{{ old('komentar') }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Kirim Review</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
