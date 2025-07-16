@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/mentors/index.css'])
@endpush

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white">Daftar Mentor</h3>
        <a href="{{ route('admin.mentors.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
            <i class="fas fa-plus me-2"></i>Tambah Mentor
        </a>
    </div>

    <form action="{{ route('admin.mentors.index') }}" method="GET" class="mb-3 d-flex justify-content-end">
        <input type="text" autocomplete="off" name="search" class="form-control w-25 me-2" placeholder="Cari nama mentor..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary rounded-pill">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <div class="table-responsive" id="tableContainer">
        @include('admin.mentors._table')
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/mentors/index.js'])
@endpush