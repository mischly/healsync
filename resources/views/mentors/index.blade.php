@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Header dan tombol tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Mentor</h3>
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

    <!-- Form Pencarian -->
    <form action="{{ route('mentors.index') }}" method="GET" class="mb-3 d-flex justify-content-end">
        <input type="text" name="search" class="form-control w-25 me-2" placeholder="Cari nama mentor..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary rounded-pill">Cari</button>
    </form>

    <!-- Tabel -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered align-middle text-center">
            <thead style="background-color: #4e73df; color: white;">
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
                    <tr style="transition: background 0.3s;" onmouseover="this.style.background='#f8f9fc'" onmouseout="this.style.background='white'">
                        <!-- Nomor urut dihitung berdasarkan halaman -->
                        <td>{{ ($mentors->currentPage() - 1) * $mentors->perPage() + $index + 1 }}</td>
                        <td>
                            @if($mentor->foto)
                                <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto" width="70" class="rounded shadow-sm">
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
                        <td colspan="5">Belum ada data mentor.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $mentors->withQueryString()->links() }}
    </div>
</div>
@endsection
