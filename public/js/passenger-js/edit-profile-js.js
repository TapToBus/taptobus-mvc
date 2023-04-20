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




// const passwordBtn = document.getElementById('passwordBtn');
// const passwordFields = document.querySelectorAll('.password-field');

// passwordBtn.addEventListener('click', function () {
//     passwordFields.forEach(function (field) {
//         field.classList.toggle('hidden');
//     });
// });


const passwordBtn = document.getElementById('passwordBtn');
const passwordFields = document.querySelectorAll('.password-field');
const currPwdField = document.getElementById('curr_pwd');
const newPwdField = document.getElementById('new_pwd');
const confirmPwdField = document.getElementById('confirm_pwd');

passwordBtn.addEventListener('click', function () {
    passwordFields.forEach(function (field) {
        field.classList.toggle('hidden');
    });
    
    // Clear password fields
    currPwdField.value = "";
    newPwdField.value = "";
    confirmPwdField.value = "";
});