document.addEventListener('DOMContentLoaded', function () {
    const avatar = document.getElementById('modal-avatar');
    const text = document.getElementById('modal-review-text');

    document.querySelectorAll('.see-more-review').forEach(button => {
        button.addEventListener('click', function () {
            const inisial = this.getAttribute('data-inisial');
            const review = this.getAttribute('data-review');

            avatar.textContent = inisial;
            text.textContent = review;
        });
    });
});