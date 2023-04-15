function openModal(id){
    const modal = document.getElementById('resetPopup');
    document.getElementById('removestaffmemberbtn').value = id
    modal.showModal();
}

function closeModal(){
    document.getElementById('resetPopup').closest()
}