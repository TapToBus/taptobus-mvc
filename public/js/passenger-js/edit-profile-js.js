const input = document.getElementById('pic');
const preview = document.getElementById('preview');

input.addEventListener('change', () => {
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        
        reader.addEventListener('load', () => {
            preview.src = reader.result;
        });
        reader.readAsDataURL(file);
    }
});