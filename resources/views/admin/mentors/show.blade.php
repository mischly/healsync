@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/mentors/show.css'])
@endpush

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Profil Mentor</h2>

    <div class="row">
        <div class="col-md-3 text-center mb-4">
            @if ($mentor->foto)
                <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto Mentor"
                    class="rounded-circle mb-3" width="150" height="150" style="object-fit: cover;">
            @else
                <i class="bi bi-person-circle text-white" style="font-size: 150px;"></i>
            @endif
        </div>
        <div class="col-md-8">
            <h4>{{ $mentor->nama }}</h4>
            <div class="mb-2">
                @foreach (explode(',', $mentor->bidang) as $tag)
                    <span class="badge bg-light text-dark border">{{ trim($tag) }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <hr class="my-4">

    <h5 class="mb-3 fw-bold">Reviews untuk {{ $mentor->nama }}</h5>
    <div class="row">
        @forelse ($mentor->reviews as $review)
            <div class="col-md-6 mb-3">
                <div class="border p-3 rounded shadow-sm bg-white">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2" style="width: 40px; height: 40px;">
                            {{ strtoupper(substr($review->nama, 0, 1)) }}
                        </div>
                        <div class="text-warning">
                            @for ($i = 0; $i < $review->rating; $i++)
                                ★
                            @endfor
                        </div>
                    </div>
                    <p class="mb-1 text-secondary">
                        {{ Str::limit($review->isi, 100) }}
                        @if (strlen($review->isi) > 100)
                            <button type="button" class="btn btn-sm btn-link p-0 see-more-review"
                                data-bs-toggle="modal"
                                data-bs-target="#reviewModal"
                                data-inisial="{{ strtoupper(substr($review->nama, 0, 1)) }}"
                                data-review="{{ $review->isi }}">
                                Lihat lebih banyak
                            </button>
                        @endif
                    </p>
                </div>
            </div>
        @empty
            <p class="text-white">Belum ada review.</p>
        @endforelse
        </div>

        <a href="{{ route('admin.mentors.index') }}" class="btn btn-danger mt-4">← Kembali</a>
    </div>

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-3">
                        <div id="modal-avatar" class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-3"
                            style="width: 40px; height: 40px; font-weight: bold;">K</div>
                        <div class="text-warning fs-5">★★★★★</div>
                    </div>
                    <p id="modal-review-text" class="mb-0 text-secondary"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/mentors/show.js'])
@endpush
