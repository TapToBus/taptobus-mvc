function goBack(){
    window.history.back();
}


function goNext(from, to, date, count, sch_id, boks_id, bus_no) {
    const url = "http://localhost/taptobus/passenger_book_seats/bus_details?from=" + from + "&to=" + to + "&date="  + date + "&count="  + count + "&sch_id=" + sch_id + "&boks_id=" + boks_id + "&bus_no="  + bus_no;
    window.location.href = url;
}