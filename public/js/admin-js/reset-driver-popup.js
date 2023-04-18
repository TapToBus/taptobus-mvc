function openModal(id){
    const modal = document.getElementById('resetPopup');
    document.getElementById('removeBusDriverBtn').value = id
    modal.showModal();
}

function closeModal(){
    document.getElementById('restPopup').close()
}