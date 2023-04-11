function goBack(){
    window.history.back();
}


function goNext(bus_no, schedule_id, booked_seats_id, count) {
    var url = "http://localhost/taptobus/passenger_book_seats/select_seats?bus_no=" + bus_no + "&schedule_id=" + schedule_id + "&booked_seats_id=" + booked_seats_id + "&count=" + count;
    window.location.href = url;
}
  