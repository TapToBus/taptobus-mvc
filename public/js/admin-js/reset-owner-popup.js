function openModal(id){
    const modal = document.getElementById('resetPopup');
    document.getElementById('removeBusOwnerBtn').value = id
    modal.showModal();
}

function closeModal(){
    document.getElementById('resetPopup').close()
}