@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin/jadwal/index.css'])
@endpush

@section('no-footer')
@endsection

@section('content')
<style>
    h3, h5, hr {
        color: #fff;
    }
</style>
<div class="container my-5">
    <h3 class="mb-4">Kelola Jadwal Praktek</h3>

    <form action="{{ route('mentor.jadwal.store') }}" method="POST">
        @csrf

        <div id="jadwal-container">
            <div class="jadwal-item border p-3 rounded mb-3 bg-white">
                <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">Hari</label>
                        <select name="jadwals[0][hari]" class="form-control" required>
                            <option value="">Pilih Hari</option>
                            @foreach(['senin','selasa','rabu','kamis','jumat','sabtu','minggu'] as $hari)
                                <option value="{{ $hari }}">{{ ucfirst($hari) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Jam</label>
                        <select name="jadwals[0][jam]" class="form-control" required>
                            @foreach(['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00'] as $jam)
                                <option value="{{ $jam }}">{{ $jam }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-jadwal w-100">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="button" id="add-jadwal" class="btn btn-secondary">+ Tambah Jadwal</button>
        </div>

        <div>
            <button type="submit" class="btn btn-primary px-4">Simpan Jadwal</button>
        </div>
    </form>

    <hr class="my-5">

    <h5>Jadwal Aktif</h5>
    <ul class="list-group">
        @forelse($jadwals as $jadwal)
            <li class="list-group-item d-flex justify-content-between">
                {{ ucfirst($jadwal->hari) }} - {{ $jadwal->jam }}
                <form method="POST" action="{{ route('mentor.jadwal.destroy', $jadwal->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">Belum ada jadwal.</li>
        @endforelse
    </ul>
</div>
@endsection

@push('scripts')
    @vite(['resources/js/jadwal/create.js'])
@endpush
