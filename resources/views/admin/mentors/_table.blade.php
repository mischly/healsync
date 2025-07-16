<table class="table table-bordered table-custom">
    <thead>
        <tr>
            <th style="width: 60px">NO</th>
            <th>FOTO</th>
            <th>NAMA</th>
            <th>BIDANG</th>
            <th>BIODATA</th>
            <th>TANGGAL DAFTAR</th>
            <th>EMAIL</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mentors as $i => $mentor)
            <tr>
                <td>{{ ($mentors->currentPage() - 1) * $mentors->perPage() + $i + 1 }}</td>
                <td>
                    @if($mentor->foto)
                        <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto" width="60" class="rounded shadow-sm">
                    @endif
                </td>
                <td>{{ $mentor->nama }}</td>
                <td>{{ $mentor->bidang }}</td>
                <td>{{ \Illuminate\Support\Str::limit($mentor->biodata, 60) }}</td>
                <td>{{ $mentor->created_at->format('d M Y') }}</td>
                <td>{{ $mentor->user->email ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.mentors.show', $mentor->id) }}" class="btn btn-sm btn-view" title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.mentors.edit', $mentor->id) }}" class="btn btn-sm btn-edit" title="Edit Mentor">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.mentors.destroy', $mentor->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin ingin menghapus mentor ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-delete" title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-white py-4">Belum ada mentor.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $mentors->withQueryString()->links('vendor.pagination.custom') }}
</div>
