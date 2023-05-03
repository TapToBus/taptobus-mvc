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
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <h1 class="heading">Bookings</h1>

        <div class="title">
            <span class="title0">Bus No</span>
            <span class="title1">From</span>
            <span class="title2">To</span>
            <span class="title3">Date</span>
            <span class="title4">Departure</span>
            <span class="title5">Time Remaining</span>
        </div>

        <?php if (empty($data)) : ?>

            <div class="no-data">
                <i class="fa-solid fa-circle-exclamation"></i> <br>
                <span>No bookings to display</span>
            </div>

        <?php else : ?>

            <?php foreach ($data as $booking) : ?>
                <div class="result" onclick="goNext('<?php echo $booking->booking_id; ?>')">
                    <span class="result1"><?php echo $booking->bus_no; ?></span>
                    <span class="result2"><?php echo $booking->from; ?></span>
                    <span class="result3"><?php echo $booking->to; ?></span>
                    <span class="result4"><?php echo $booking->departure_date; ?></span>
                    <span class="result5"><?php echo $booking->departure_time; ?></span>

                    <?php if ($booking->remaining_days > 0 && $booking->remaining_hours >= 0) : ?>
                        <span class="result6 low-priority"><?php echo 'More than ' . $booking->remaining_days . ' days'; ?></span>
                    <?php elseif ($booking->remaining_days == 0 && $booking->remaining_hours > 1) : ?>
                        <span class="result6 middle-priority"><?php echo 'More than ' . $booking->remaining_hours . ' hours'; ?></span>
                    <?php elseif ($booking->remaining_days == 0 && $booking->remaining_hours == 1) : ?>
                        <span class="result6 middle-priority"><?php echo 'More than ' . $booking->remaining_hours . ' hour'; ?></span>
                    <?php elseif ($booking->remaining_days == 0 && $booking->remaining_hours == 0) : ?>
                        <span class="result6 high-priority"><?php echo 'Less than 1 hour'; ?></span>
                    <?php endif; ?>

                    <!-- <span class="result6"><?php echo $booking->remaining_days . ' d : ' . $booking->remaining_hours . ' h'; ?></span> -->
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

    <!-- <script src="<?php echo URLROOT; ?>/js/passenger-js/bookings-js.js"></script> -->

    <script>
        function goNext(booking_id) {
            const url = "http://localhost/taptobus/passenger_bookings/booking_details?bok_id=" + booking_id;
            window.location.href = url;
        }
    </script>
</body>

</html>