@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card mx-auto shadow" style="max-width: 600px;">
        <div class="card-header bg-light">
            <h4 class="mb-0">Beri Review untuk {{ $mentor->nama }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (1–5)</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="">Pilih rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea name="komentar" id="komentar" class="form-control" rows="4" placeholder="Tulis ulasan Anda (opsional)"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Kirim Review</button>
            </form>
        </div>
    </div>
</div>
@endsection
