<table class="table-custom">
    <thead>
        <tr>
            <th style="width: 60px">NO</th>
            <th>FOTO</th>
            <th>NAMA</th>
            <th>BIDANG</th>
            <th>BIODATA</th>
            <th>EMAIL</th>
            <th style="width: 110px">AKSI</th>
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
                <td>{{ $mentor->user->email ?? '-' }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.mentors.show', $mentor->id) }}" class="btn btn-outline-info" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.mentors.edit', $mentor->id) }}" class="btn btn-outline-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.mentors.destroy', $mentor->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-white py-4">Belum ada mentor.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $mentors->withQueryString()->links('vendor.pagination.custom') }}
</div>
