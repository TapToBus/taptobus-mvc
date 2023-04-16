function goNext(booking_id){
    const url = "http://localhost/taptobus/passenger_bookings/booking_details?booking_id=" + booking_id;
    window.location.href = url;
}