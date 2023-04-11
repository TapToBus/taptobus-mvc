const seats = document.querySelectorAll(".seat");

seats.forEach((seat) => {
    seat.addEventListener("change", (e) => {
        if (e.target.checked) {
            e.target.nextElementSibling.classList.add("selected");
        } else {
            e.target.nextElementSibling.classList.remove("selected");
        }
    });
});