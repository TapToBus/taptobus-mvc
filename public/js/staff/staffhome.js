
function openModal() {
    document.querySelector('.notice-modal').showModal()
}

function closeModal() {
    document.querySelector('.notice-modal').close()
}

// function enableEdit(id) {
//     document.getElementById(`title-${id}`).disabled = false
//     document.getElementById(`title-${id}`).style.border = "1px solid #000"
//     document.getElementById(`text-area-${id}`).disabled = false
//     document.getElementById(`text-area-${id}`).style.border = "1px solid #000"
//     document.getElementById(`save-cancel-btns-${id}`).style.display = 'block'
//     document.getElementById('save-edit').value = id;
// }

document.getElementById("staff").addEventListener("click", function(event) {
    event.preventDefault();
    return false;
  });





  //------------------  notice form popup date vlaidation--------------------------

  const  date_from = document.getElementById('date_from') 
  const date_to = document.getElementById('date_to')


//   The resulting string is then split at the letter 'T',
//  which separates the date and time portions of the string. 
// The [0] index is used to retrieve only the date portion of the string in the format 'YYYY-MM-DD'.
  const today = new Date().toISOString().split('T')[0];

// date_from min value should be today date
   date_from.setAttribute('min', today);

// date_to shoud be disable until user select date_from
   date_to.disabled = true;

// we need to check each and every time when change the  from date.
// so we need to write a event to change the date_from attribute
date_from.addEventListener("change" , ()=>{

    let selected_date_from = date_from.value;
    date_to.setAttribute('min', selected_date_from); // minimum date_to value should be selected_date_from
    date_to.disabled =false;  // Now to date can be changeble.
});

date_to.addEventListener("change",()=>{
    let selected_date_to = date_to.value;
    date_from.setAttribute('max', selected_date_to);
});


// -------------- notice delete confirmation dialog box --------------

let dltconfirmpopup = document.getElementById("dlt_popup");

function openconfirmdelete(){
   const opendeletepopup = document.getElementById("dlt_popup");
   opendeletepopup.showModal();
}


function closeconfirmdelete(){
    const opendeletepopup = document.getElementById("dlt_popup");
    opendeletepopup.closeModal();
 }
 






