@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/mentors/index.css'])
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableContainer = document.getElementById('tableContainer');
        const searchInput = document.querySelector('input[name="search"]');
        let searchTimeout = null;

        // Pagination AJAX
        tableContainer.addEventListener('click', function (e) {
            const target = e.target.closest('a');
            if (target && target.closest('.pagination-custom')) {
                e.preventDefault();
                const url = target.getAttribute('href');

                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => {
                    tableContainer.innerHTML = html;
                })
                .catch(err => console.error(err));
            }
        });

        // Live search AJAX
        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const query = searchInput.value;
                const url = `{{ route('admin.mentors.index') }}?search=${encodeURIComponent(query)}`;

                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => {
                    tableContainer.innerHTML = html;
                })
                .catch(err => console.error(err));
            }, 300); // Delay 300ms untuk debounce
        });
    });
</script>
@endpush

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white">Daftar Mentor</h3>
        <a href="{{ route('admin.mentors.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
            <i class="fas fa-plus me-2"></i>Tambah Mentor
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded">
            {{ session('success') }}
        </div>
    @endif

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
