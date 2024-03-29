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

        <?php if ($data['bookings'] == NULL) : ?>

            <div class="no-data">
                <i class="fa-solid fa-circle-exclamation"></i> <br>
                <span>No bookings to display</span>
            </div>

        <?php else : ?>

            <?php foreach ($data['bookings'] as $booking) : ?>

                <div class="result" onclick="goNext('<?php echo $booking->id ?>')">
                    <span class="result1"><?php echo $booking->bus_no; ?></span>
                    <span class="result2"><?php echo $booking->from; ?></span>
                    <span class="result3"><?php echo $booking->to; ?></span>
                    <span class="result4"><?php echo $booking->date; ?></span>
                    <span class="result5"><?php echo date('h:i A', strtotime($booking->time)); ?></span>

                    <?php
                        // Convert the departureDateTime and currentDateTime strings to DateTime objects.
                        $departureDate = new DateTime($booking->departure_datetime);
                        $currentDate = new DateTime(date('Y-m-d H:i:s'));   // create an object ysing current date and time

                        // Calculate the difference between the departureDate and the currentDate DateTime objects.
                        $diff = $departureDate->diff($currentDate);

                        $days = $diff->days;   // for get days
                        $hours = $diff->h;     // for get hours
                        $minutes = $diff->i;   // for get minutes
                    ?>

                    <?php if ($days > 1) : ?>
                        <span class="result6 low-priority"><?php echo 'More than ' . $days . ' days'; ?></span>
                    <?php elseif ($days == 1) : ?>
                        <span class="result6 low-priority"><?php echo 'More than 1 day'; ?></span>
                    <?php elseif ($hours > 1) : ?>
                        <span class="result6 middle-priority"><?php echo 'More than ' . $hours . ' hours'; ?></span>
                    <?php elseif ($hours == 1) : ?>
                        <span class="result6 high-priority"><?php echo 'More than 1 hour'; ?></span>
                    <?php else : ?>
                        <span class="result6 high-priority"><?php echo 'Less than 1 hour'; ?></span>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>

        <?php endif; ?>
    </div>

    
    <script>
        function goNext(booking_id) {
            const url = "http://localhost/taptobus/passenger_bookings/booking_details?bok_id=" + booking_id;
            window.location.href = url;
        }
    </script>
</body>

</html>