<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/booking-details-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <!-- include passenger navbar -->
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <!-- page content -->
    <div class="main">
        <h2>Booking Details</h2>

        <div class="container">
            <div class="field1">
                <span>Makumbura <i class="fa-solid fa-arrow-right"></i> Galle</span>
            </div>

            <div class="field2">
                <div class="col1">
                    <div class="row1">
                        <span class="inner-col1">Date:</span>
                        <span class="inner-col2">12-09-2022</span>
                    </div>

                    <div class="row2">
                        <span class="inner-col1">Arrival:</span>
                        <span class="inner-col2">09:00 am</span>
                    </div>

                    <div class="row3">
                        <span class="inner-col1">Depature:</span>
                        <span class="inner-col2">09:30 am</span>
                    </div>

                    <div class="row4">
                        <span class="inner-col1">Time Remaining:</span>
                        <span class="inner-col2">1d : 23h : 56m</span>
                    </div>
                </div>

                <div class="col2">
                    <div class="row1">
                        <span class="inner-col1">Bus No:</span>
                        <span class="inner-col2">NC - 7865</span>
                    </div>

                    <div class="row2">
                        <span class="inner-col1">Passenger Count:</span>
                        <span class="inner-col2">5</span>
                    </div>

                    <div class="row3">
                        <span class="inner-col1">Booked Seats:</span>
                        <span class="inner-col2">12, 13, 34, 45, 46</span>
                    </div>

                    <div class="row4">
                        <span class="inner-col1">Ticket Price:</span>
                        <span class="inner-col2">LKR 4060.00</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn">
            <button class="left" onclick="window.history.back()">Back</button>
            <a href="<?php echo URLROOT; ?>/passenger_bookings/bookings"><button class="right" >Cancel</button></a>
        </div>
    </div>
</body>

</html>