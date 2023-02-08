<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/bookings-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <!-- include passenger navbar -->
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <!-- page content -->
    <div class="main">
        <h2>Bookings</h2>

        <div class="result">
            <!-- hedings of the table -->
            <div class="head-row">
                <span class="col1">Bus No</span>
                <span class="col2">Date</span>
                <span class="col3">Arrival</span>
                <span class="col4">Depature</span>
                <span class="col5">Booked Seats</span>
                <span class="col6">Time Remaining</span>
            </div>

            <!-- content of the table -->
            <a href="<?php echo URLROOT; ?>/passenger_bookings/booking_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">12-03-2022</span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">4</span>
                    <span class="col6">1d : 13h : 34m</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_bookings/booking_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">12-03-2022</span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">4</span>
                    <span class="col6">1d : 13h : 34m</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_bookings/booking_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">12-03-2022</span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">4</span>
                    <span class="col6">1d : 13h : 34m</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_bookings/booking_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">12-03-2022</span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">4</span>
                    <span class="col6">1d : 13h : 34m</span>
                </div>
            </a>
        </div>
    </div>
</body>

</html>