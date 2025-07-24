@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/mentors/index.css'])
@endpush

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white">Daftar Mentor</h3>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">
                 <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
    <a href="{{ route('admin.mentors.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
        <i class="fas fa-plus me-2"></i>Tambah Mentor
    </a>

    <form action="{{ route('admin.mentors.index') }}" method="GET" class="d-flex">
        <input type="text" autocomplete="off" name="search" class="form-control me-2"
               placeholder="Cari nama mentor..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary rounded-pill">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

<div class="table-responsive" id="tableContainer">
    @include('admin.mentors._table')
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/mentors/index.js'])
@endpush