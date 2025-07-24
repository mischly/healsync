document.addEventListener('DOMContentLoaded', function () {
    let index = 1;

    const hariOptions = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']
        .map(hari => `<option value="${hari}">${hari.charAt(0).toUpperCase() + hari.slice(1)}</option>`)
        .join('');

    const jamOptions = Array.from({ length: 15 }, (_, i) => {
        const hour = i + 8; // mulai dari 08:00
        const jam = hour.toString().padStart(2, '0') + ':00';
        return `<option value="${jam}">${jam}</option>`;
    }).join('');

    document.getElementById('add-jadwal').addEventListener('click', function () {
        const container = document.getElementById('jadwal-container');
        const html = `
        <div class="jadwal-item border p-3 rounded mb-3 bg-white">
            <div class="row">
                <div class="col-md-5">
                    <label class="form-label">Hari</label>
                    <select name="jadwals[${index}][hari]" class="form-control" required>
                        <option value="" hidden>Pilih Hari</option>
                        ${hariOptions}
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Jam</label>
                    <select name="jadwals[${index}][jam]" class="form-control" required>
                        <option value="" hidden>Pilih Jam</option>
                        ${jamOptions}
                    </select>
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

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-konfirmasi-hapus').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Jadwal?',
                text: "Tindakan ini tidak dapat dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});

