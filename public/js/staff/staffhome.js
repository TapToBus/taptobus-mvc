
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
}

