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
                <div class="result">
                    <span class="result1"><?php echo $booking->bus_no; ?></span>
                    <span class="result2"><?php echo $booking->from; ?></span>
                    <span class="result3"><?php echo $booking->to; ?></span>
                    <span class="result4"><?php echo $booking->date; ?></span>
                    <span class="result5"><?php echo $booking->departure_time; ?></span>
                    <span class="result6">2d : 23h : 42m : 23s</span>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/bookings-js.js"></script>
</body>

</html>