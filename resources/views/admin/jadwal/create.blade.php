@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/admin/jadwal/index.css'])
@endpush

@section('content')
<div class="container mt-5">
    <h3 class="text-white mb-4">Tambah Jadwal Praktek</h3>

    <form action="{{ route('admin.jadwal.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="mentor_id" class="form-label text-white">Pilih Mentor</label>
            <select name="mentor_id" id="mentor_id" class="form-control" required>
                @foreach($mentors as $mentor)
                    <option value="{{ $mentor->id }}">{{ $mentor->nama }}</option>
                @endforeach
            </select>
        </div>

        <div id="jadwal-container">
            <div class="jadwal-item border p-3 rounded mb-3 bg-white">
                <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">Hari</label>
                        <select name="jadwals[0][hari]" class="form-control" required>
                            <option value="">Pilih Hari</option>
                            @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                                <option value="{{ $hari }}">{{ ucfirst($hari) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Jam</label>
                        <input type="text" name="jadwals[0][jam]" class="form-control" placeholder="Contoh: 09:00 - 11:00" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-jadwal w-100">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="button" id="add-jadwal" class="btn btn-secondary">+ Tambah Baris Jadwal</button>
        </div>

        <div>
            <button type="submit" class="btn btn-primary px-4">Simpan Jadwal</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    @vite(['resources/js/jadwal/create.js'])
@endpush
