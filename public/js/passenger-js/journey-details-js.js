const fromDropdown = document.getElementById("from");
const toDropdown = document.getElementById("to");

// Remove selected option from both dropdowns
function removeOption(value) {
    for (let i = 0; i < fromDropdown.options.length; i++) {
        if (fromDropdown.options[i].value === value) {
            fromDropdown.remove(i);
            break;
        }
    }
    for (let i = 0; i < toDropdown.options.length; i++) {
        if (toDropdown.options[i].value === value) {
            toDropdown.remove(i);
            break;
        }
    }
}

// Handle changes to "From" dropdown
fromDropdown.addEventListener("change", function () {
    const selectedValue = fromDropdown.value;
    for (let i = 0; i < toDropdown.options.length; i++) {
        if (toDropdown.options[i].value === selectedValue) {
            toDropdown.remove(i);
            break;
        }
    }
});

// Handle changes to "To" dropdown
toDropdown.addEventListener("change", function () {
    const selectedValue = toDropdown.value;
    for (let i = 0; i < fromDropdown.options.length; i++) {
        if (fromDropdown.options[i].value === selectedValue) {
            fromDropdown.remove(i);
            break;
        }
    }
});


// -----------------------------------------------------------------------------------------------

const today = new Date().toISOString().split('T')[0];

document.getElementById('date').setAttribute('min', today);