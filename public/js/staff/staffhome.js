
function openModal() {
    document.querySelector('.notice-modal').showModal()
}

function closeModal() {
    document.querySelector('.notice-modal').close()
}

function enableEdit(id) {
    document.getElementById(`title-${id}`).disabled = false
    document.getElementById(`title-${id}`).style.border = "1px solid #000"
    document.getElementById(`text-area-${id}`).disabled = false
    document.getElementById(`text-area-${id}`).style.border = "1px solid #000"
    document.getElementById(`save-cancel-btns-${id}`).style.display = 'block'
    document.getElementById('save-edit').value = id;
}

// available users
// const checkboxes = document.querySelectorAll('input[name="role[]"]');
// let selectedRoles = [];

// checkboxes.forEach((checkbox) => {
//   checkbox.addEventListener('change', function() {
//     if (this.checked) {
//       selectedRoles.push(this.value);
//     } else {
//       const index = selectedRoles.indexOf(this.value);
//       selectedRoles.splice(index, 1);
//     }
//     console.log(selectedRoles);
//   });
// });

