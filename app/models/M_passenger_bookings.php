<?php

class M_passenger_bookings{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBookings($passenger_nic){
        $this->db->query('SELECT id, bus_no, `from`, `to`, 
                            DATE(departure_datetime) as date, TIME(departure_datetime) as time, departure_datetime
                            FROM bookings 
                            WHERE passenger_nic = :passenger_nic AND status = \'pending\'
                            ORDER BY departure_datetime');


        $this->db->bind(':passenger_nic', $passenger_nic);
        $result = $this->db->resultSet();

        return $result;
    }


    public function getBookingDetails($bok_id){
        $this->db->query('SELECT * FROM bookings WHERE id=:bok_id');
        $this->db->bind(':bok_id', $bok_id);
        return $this->db->single();
    }


    public function updateHistory($bok_id){
        $booking = $this->getBookingDetails($bok_id);

        $departureDate = new DateTime($booking->departure_datetime);
        $currentDate = new DateTime(date('Y-m-d H:i:s'));

        $diff = $departureDate->diff($currentDate);
        $days = $diff->days;   // for get days

        // update history table
        $this->db->query('INSERT INTO history(`from`, `to`, started_datetime, bus_no, passenger_count, price, refund, booked_datetime, cancelled_datetime, status, passenger_nic)
                                VALUES(:from, :to, :started_datetime, :bus_no, :passenger_count, :price, :refund, :booked_datetime, NOW(), \'Cancelled\', :passenger_nic)');
        $this->db->bind(':from', $booking->from);
        $this->db->bind(':to', $booking->to);
        $this->db->bind(':started_datetime', $booking->departure_datetime);
        $this->db->bind(':bus_no', $booking->bus_no);
        $this->db->bind(':passenger_count', $booking->passenger_count);
        $this->db->bind(':price', $booking->price);

        if($days >= 2){
            $refund = $booking->price * 0.75;
        }elseif($days >= 1){
            $refund = $booking->price * 0.5;
        }else{
            $refund = $booking->price * 0.25;
        }

        $this->db->bind(':refund', $refund);
        $this->db->bind(':booked_datetime', $booking->booked_datetime);
        $this->db->bind(':passenger_nic', $booking->passenger_nic);
        $this->db->execute();

        // update booked seats table
        $this->updateBookedSeats($booking->booked_seats_id, $booking->booked_seats, $booking->passenger_count);

        // delete booking row
        $this->db->query('DELETE FROM bookings WHERE id=:id');
        $this->db->bind(':id', $booking->id);
        $this->db->execute();

        return $refund;
    }


    function updateBookedSeats($boks_id, $seats, $count){
        // Split the string into an array of variable names
        $seat_no = explode(", ", $seats);
    
        // Initialize an empty string to store the result
        $result = "";
    
        // Loop through each variable name in the array and add it to the result string
        foreach ($seat_no as $name) {
            $result .= "$name=0, ";
        }
    
        // Remove the trailing comma and space from the result string
        $result = substr($result, 0, -2);
    
        $query = "UPDATE booked_seats SET $result, available_seats_count=available_seats_count+$count WHERE id=:boks_id;";
        $this->db->query($query);
        $this->db->bind(':boks_id', $boks_id);
    
        return $this->db->execute();
    }    
}