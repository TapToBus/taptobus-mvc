
function openAddNewScheduleModal(){
    const addNewScheduleModal = document.getElementById('addNewScheduleModal')
    addNewScheduleModal.showModal()
}

function closeAddNewScheduleModal(){
    const addNewScheduleModal = document.getElementById('addNewScheduleModal')
    addNewScheduleModal.close()
}

function openEditScheduleModal(data){  // don't use $ mark when passing data to the JS function.
    console.log(data);  //  use to print passed data on the console.
    const editScheduleModal = document.getElementById('editScheduleModal')
    document.getElementById('u-bus_no').value = data.bus_no
    document.getElementById('u-location_from').value = data.from
    document.getElementById('u-location_to').value = data.to
    document.getElementById('u-day').value = data.day
    document.getElementById('u-arrival_time').value = data.arrival_time
    document.getElementById('u-departrue_time').value = data.departure_time
    document.getElementById('u-ticket_price').value = data.ticket_price
    document.getElementById('editBtn').value = data.id
    editScheduleModal.showModal()
}

function closeEditScheduleModal(){
    const editScheduleModal = document.getElementById('editScheduleModal')
    editScheduleModal.close()
}

function openDeleteConfirmationModal(id, bus_no) {
    const deleteConfirmModal = document.getElementById('deleteConfirmModal')
    document.getElementById('d-bus_no').value = bus_no
    document.getElementById('deleteBtn').value = id
    deleteConfirmModal.showModal()
}

function closeDeleteConfirmationModal(){
    const deleteConfirmModal = document.getElementById('deleteConfirmModal')
    deleteConfirmModal.close()
}

// ------------------ Add schedule form location validation -----------------------

const destinations = ['Galle', 'Makubura']

const selectboxs = document.querySelectorAll('.location-select')
console.log(selectboxs);

selectboxs.forEach((select, idx) => {
  select.addEventListener('change', () => {
    oposite = destinations[destinations.indexOf(select.value) ? 0 : 1]
    console.log(oposite)
    selectboxs[idx ? 0 : 1].value = oposite
  })
})  

// Edit schedule form location validation

const e_destinations = ['Galle', 'Makubura']

const e_selectboxs = document.querySelectorAll('.u-location-select')
console.log(e_selectboxs);

e_selectboxs.forEach((e_select, idx) => {
    e_select.addEventListener('change', () => {
    e_oposite = e_destinations[e_destinations.indexOf(e_select.value) ? 0 : 1]
    console.log(e_oposite)
    e_selectboxs[idx ? 0 : 1].value = e_oposite
  })
})  



// ---------------- Add schedule form time validation ------------------------

// const arrival_time = document.getElementById('arrival_time');
// const departrue_time = document.getElementById('departrue_time');


// departrue_time.disabled = true;

// arrival_time.addEventListener("change",()=>{
//     let selectedArrivalTime = arrival_time.value;
//     console.log(selectedArrivalTime);
//     departrue_time.setAttribute('min', selectedArrivalTime);
//     departrue_time.disabled = false;

// });

// departrue_time.addEventListener("change", ()=>{
//     let selectedDepartureTime = departrue_time.value;
//     arrival_time.setAttribute('max',selectedDepartureTime);
// });