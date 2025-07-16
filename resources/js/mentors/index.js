document.addEventListener('DOMContentLoaded', function () {
    const tableContainer = document.getElementById('tableContainer');
    const searchInput = document.querySelector('input[name="search"]');
    let searchTimeout = null;

    // Pagination AJAX
    tableContainer.addEventListener('click', function (e) {
        const target = e.target.closest('a');
        if (target && target.closest('.pagination-custom')) {
            e.preventDefault();
            const url = target.getAttribute('href');

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                tableContainer.innerHTML = html;
            })
            .catch(err => console.error(err));
        }
    });

    // Live search AJAX
    searchInput.addEventListener('input', function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const query = searchInput.value;
            const url = `{{ route('admin.mentors.index') }}?search=${encodeURIComponent(query)}`;

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                tableContainer.innerHTML = html;
            })
            .catch(err => console.error(err));
        }, 300); // Delay 300ms untuk debounce
    });
});