@extends('layouts.app')

@section('content')
<link href="{{ asset('css/mentor.css') }}" rel="stylesheet">

<div class="container py-5">
    <!-- Header dan tombol tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h3 class="mb-3 mb-md-0">Daftar Mentor</h3>
        <a href="{{ route('mentors.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
            Tambah Mentor
        </a>
    </div>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form pencarian -->
    <form action="{{ route('mentors.index') }}" method="GET" class="mb-4 d-flex justify-content-end flex-wrap gap-2">
        <input type="text" name="search" class="form-control w-auto" placeholder="Cari nama mentor..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary rounded-pill px-4">Cari</button>
    </form>

    <!-- Tabel -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered align-middle text-center mb-0">
            <thead class="table-header text-white" style="background-color: #4e73df;">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Bidang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mentors as $index => $mentor)
                    <tr class="table-hover-effect">
                        <td>{{ ($mentors->currentPage() - 1) * $mentors->perPage() + $index + 1 }}</td>
                        <td>
                            @if($mentor->foto)
                                <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto" width="70" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">Tidak Ada</span>
                            @endif
                        </td>
                        <td>{{ $mentor->nama }}</td>
                        <td>{{ $mentor->bidang }}</td>
                        <td>
                            <a href="{{ route('mentors.show', $mentor->id) }}" class="btn btn-info btn-sm rounded-pill px-3 mb-1">Detail</a>
                            <a href="{{ route('mentors.edit', $mentor->id) }}" class="btn btn-warning btn-sm rounded-pill px-3 mb-1">Edit</a>
                            <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm rounded-pill px-3 mb-1">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted">Belum ada data mentor.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Info dan pagination -->
    @if ($mentors->total() > 0)
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
        <div class="text-muted small mb-2">
            Menampilkan {{ $mentors->firstItem() }} - {{ $mentors->lastItem() }} dari total {{ $mentors->total() }} mentor
        </div>
        <div class="d-flex justify-content-center">
            {{ $mentors->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
