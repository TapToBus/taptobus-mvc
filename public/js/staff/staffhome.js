
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

// // get the drop down from the document

// const dropdowns = document.querySelectorAll('.dropdown');

// //loop through all dropdown elements
// dropdowns.forEach(dropdown => {
//     // get inner elements from each dropdown
//     const select = dropdown.querySelector('.select');
//     const caret = dropdown.querySelector('.caret');
//     const menu = dropdown.querySelector('.dropmenu');
//     const options = dropdown.querySelector('.dropmenu li');
//     const selected = dropdown.querySelector('.selected');

// // we are using this method in order to have multiple dropdown menus on the page work

// // Add a click event to the select elements

// select.addEventListener('click',() => {
//     // Add the clicked select styles to the select element
//     select.classList.toggle('select-clicked');

//     // Add the rotate styles to the caret element
//     caret.classList.toggle('caret-rotate');

//     // Add the open styles to the menu element
//     dropmenu.classList.toggle('dropmenu-open');
// });

// //Loop through all option elements 
// options.forEach(option => {
//     // Add a click event to the select elements
//     options.addEventListener('click',() => {
//         // change selected inner text to clicked option inner text
//         selected.innerText = option.innerText;

//         // Add the clicked select styles to the select element
//         select.classList.remove('select-clicked');

//         //Add the rotate styles to the caaret element
//         caret.classList.remove('caret-rotate');

//         //Add the open styles to the menu element
//         menu.classList.remove('dropmenu-open');

//         // remove active class from all option elements
//         option.forEach(option =>{
//             option.classList.remove('active');
//         });
        
//         //Add active class to clicked option element
//         option.classList.add('active');

//         });

//     });

// });