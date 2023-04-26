function openModal(id){
    const modal = document.getElementById('DeletePopup');
    document.getElementById('deleteBusDriverBtn').value = id
    modal.showModal();
}

function closeModal(){
    document.getElementById('DeletePopup').close()
}