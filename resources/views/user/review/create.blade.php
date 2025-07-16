@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/review/create.css'])
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
