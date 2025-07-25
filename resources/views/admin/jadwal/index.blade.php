@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/admin/jadwal/index.css'])
@endpush

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white">Daftar Jadwal Praktek</h3>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">
                 <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
            <i class="fas fa-plus me-2"></i>Tambah Jadwal
        </a>
    </div>
    
<div class="card shadow-sm rounded-lg">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-custom">
                <thead>
                    <tr>
                        <th>Mentor</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $jadwal)
                    <tr>
                            <td>{{ $jadwal->mentor->nama }}</td>
                            <td>{{ ucfirst($jadwal->hari) }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam)->format('H:i') }}</td>
                            <td>
                                <button class="btn btn-outline-danger btn-delete" data-id="{{ $jadwal->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                
                                <form id="form-delete-{{ $jadwal->id }}" action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center py-4">Belum ada jadwal yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/jadwal/index.js'])
@endpush
