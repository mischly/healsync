document.getElementById('avatar').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const container = document.getElementById('avatar-container');

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(evt) {
            const current = document.getElementById('avatar-preview');
            if (current.tagName.toLowerCase() === 'i') {
                const img = document.createElement('img');
                img.id = 'avatar-preview';
                img.src = evt.target.result;
                img.alt = 'Avatar';
                img.className = 'avatar-img rounded-circle';

                container.innerHTML = '';
                container.appendChild(img);
            } else {
                current.src = evt.target.result;
            }
        };
        reader.readAsDataURL(file);
    }
});