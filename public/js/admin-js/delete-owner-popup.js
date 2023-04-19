function openModal(id){
    const modal = document.getElementById('DeletePopup');
    document.getElementById('deleteBusOwnerBtn').value = id
    modal.showModal();
}

function closeModal(){
    document.getElementById('DeletePopup').close()
}