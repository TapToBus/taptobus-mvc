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
    <div class="box">
        <h1><?php echo $data['booking']->from; ?> > <?php echo $data['booking']->to; ?></h1>

        <div class="content">
            <div class="left">
                <div class="row">
                    <span class="col1">Date:</span>
                    <span class="col2"><?php echo date("Y-m-d", strtotime($data['booking']->departure_datetime)) ?></span>
                </div>

                <div class="row">
                    <span class="col1">Departure time:</span>
                    <span class="col2"><?php echo date("g:i A", strtotime($data['booking']->departure_datetime)) ?></span>
                </div>

                <!-- <div class="row">
                    <span class="col1">Time remaining:</span>
                    <span class="col2">More than 12 days</span>
                </div> -->

                <div class="row">
                    <span class="col1">Passenger count:</span>
                    <span class="col2"><?php echo $data['booking']->passenger_count; ?></span>
                </div>

                <div class="row">
                    <span class="col1">Booked seats:</span>
                    <span class="col2"><?php echo str_replace('s', '', $data['booking']->booked_seats); ?></span>
                </div>
            </div>

            <div class="right">
                <div class="row">
                    <span class="col1">Bus No:</span>
                    <span class="col2"><?php echo $data['booking']->bus_no; ?></span>
                </div>

                <div class="row">
                    <span class="col1">Booked on:</span>
                    <span class="col2"><?php echo date("Y-m-d g:i A", strtotime($data['booking']->booked_datetime)); ?></span>
                </div>

                <div class="row">
                    <span class="col1">Ticket price:</span>
                    <span class="col2">LKR <?php echo $data['booking']->price; ?></span>
                </div>

                <div class="row">
                    <span class="col1">Booking code:</span>
                    <span class="col2"><?php echo $data['booking']->booking_code; ?></span>
                </div>
            </div>
        </div>

        <div class="btn">
            <form method="POST" action="<?php echo URLROOT; ?>/passenger_bookings/booking_details">
                <input type="hidden" name="booking_id" value="<?php echo $data['booking']->id; ?>">
                <button class="left-btn" type="submit">Cancel</button>
            </form>
            <button class="right-btn" onclick="goBack()">Ok</button>
        </div>
    </div>


    <script src="<?php echo URLROOT; ?>/js/passenger-js/bookings-details-js.js"></script>
</body>

</html>