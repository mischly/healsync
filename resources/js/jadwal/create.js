document.addEventListener('DOMContentLoaded', function () {
    let index = 1;

    document.getElementById('add-jadwal').addEventListener('click', function () {
        const container = document.getElementById('jadwal-container');
        const html = `
        <div class="jadwal-item border p-3 rounded mb-3 bg-white">
            <div class="row">
                <div class="col-md-5">
                    <label class="form-label">Hari</label>
                    <select name="jadwals[${index}][hari]" class="form-control" required>
                        <option value="">Pilih Hari</option>
                        @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                            <option value="{{ $hari }}">{{ ucfirst($hari) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Jam</label>
                    <input type="text" name="jadwals[${index}][jam]" class="form-control" placeholder="Contoh: 09:00 - 11:00" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-jadwal w-100">Hapus</button>
                </div>
            </div>
        </div>`;
        container.insertAdjacentHTML('beforeend', html);
        index++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-jadwal')) {
            e.target.closest('.jadwal-item').remove();
        }
    });
});