function goBack(){
    window.history.back();
}


document.addEventListener('DOMContentLoaded', function() {
    var selectElements = document.querySelectorAll('select');
    for (var i = 0; i < selectElements.length; i++) {
        selectElements[i].addEventListener('change', function(event) {
            var selectedOption = event.target.value;
            var selectElements = document.querySelectorAll('select');
            for (var j = 0; j < selectElements.length; j++) {
                if (selectElements[j] !== event.target) {
                    var optionElements = selectElements[j].querySelectorAll('option');
                    for (var k = 1; k < optionElements.length; k++) {
                        var optionValue = optionElements[k].value;
                        if (optionValue === selectedOption) {
                            optionElements[k].remove();
                        }
                    }
                }
            }
        });
    }
});