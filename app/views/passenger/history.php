<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/history-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <h1 class="heading">History</h1>

        <div class="title">
            <span class="title0">No</span>
            <span class="title1">From</span>
            <span class="title2">To</span>
            <span class="title3">Date</span>
            <span class="title4">Bus No</span>
            <span class="title5">Status</span>
        </div>

        <?php if ($data['hist'] == NULL) : ?>

            <div class="no-data">
                <i class="fa-solid fa-circle-exclamation"></i> <br>
                <span>No data to display</span>
            </div>

        <?php else : ?>

            <?php $count = 1; ?>

            <?php foreach ($data['hist'] as $hist) : ?>
                <div class="result" id="result">
                    <span class="result0"><?php echo $count++; ?></span>
                    <span class="result1"><?php echo $hist->from; ?></span>
                    <span class="result2"><?php echo $hist->to; ?></span>
                    <span class="result3"><?php echo $hist->date; ?></span>
                    <span class="result4"><?php echo $hist->bus_no; ?></span>
                    <span class="result5"><?php echo $hist->status; ?></span>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

    <!-- <div class="popup" id="popup">
        <span class="close-btn" id="close-btn"><i class="fa-sharp fa-solid fa-circle-xmark"></i></span>

        <span class="title">Galle > Makumbura</span>

        <div class="content">
            <div class="left">
                <div class="row">
                    <span class="col1">Date:</span>
                    <span class="col2">2023-02-09</span>
                </div>

                <div class="row">
                    <span class="col1">Started time:</span>
                    <span class="col2">16:30</span>
                </div>

                <div class="row">
                    <span class="col1">Bus No:</span>
                    <span class="col2">NB-1234</span>
                </div>

                <div class="row">
                    <span class="col1">Passenger count:</span>
                    <span class="col2">5</span>
                </div>

                <div class="row">
                    <span class="col1">Ticket price:</span>
                    <span class="col2">LKR 5030.00</span>
                </div>

                <div class="row">
                    <span class="col1">Status:</span>
                    <span class="col2">Cancelled</span>
                </div>
            </div>

            <div class="right">
                <div class="row">
                    <span class="col1">Booked date:</span>
                    <span class="col2">2023-02-01</span>
                </div>

                <div class="row">
                    <span class="col1">Booked time:</span>
                    <span class="col2">16:30</span>
                </div>

                <div class="row">
                    <span class="col1">Cancelled date:</span>
                    <span class="col2">2023-09-12</span>
                </div>

                <div class="row">
                    <span class="col1">Cancelled time:</span>
                    <span class="col2">15:00</span>
                </div>

                <div class="row">
                    <span class="col1">Refund:</span>
                    <span class="col2">LKR 5030.00</span>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <script src="<?php echo URLROOT; ?>/js/passenger-js/history-js.js"></script> -->
</body>

</html>