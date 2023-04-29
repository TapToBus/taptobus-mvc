/*const fromDropdown = document.getElementById("from");
const toDropdown = document.getElementById("to");


// handle changes to "From" dropdown
fromDropdown.addEventListener("change", function () {
    const selectedValue = fromDropdown.value;

    for (let i = 0; i < toDropdown.options.length; i++) {
        if (toDropdown.options[i].value === selectedValue) {
            toDropdown.remove(i);
            break;
        }
    }
});


// handle changes to "To" dropdown
toDropdown.addEventListener("change", function () {
    const selectedValue = toDropdown.value;
    
    for (let i = 0; i < fromDropdown.options.length; i++) {
        if (fromDropdown.options[i].value === selectedValue) {
            fromDropdown.remove(i);
            break;
        }
    }
});


// handle date

// get the current date
const today = new Date().toISOString().split('T')[0];

// set the minimum date for the input field
document.getElementById('date').setAttribute('min', today);

// calculate the maximum date (2 weeks from now)
var maxDate = new Date();
maxDate.setDate(maxDate.getDate() + 13);
var maxDateStr = maxDate.toISOString().split('T')[0];

// Set the maximum date for the input field
document.getElementById('date').setAttribute('max', maxDateStr);*/