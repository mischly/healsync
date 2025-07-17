document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-delete');
    
    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data jadwal akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        });
    });
});