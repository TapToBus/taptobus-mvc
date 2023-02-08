<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/available-buses-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <!-- include passenger navbar -->
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <!-- page content -->
    <div class="main">
        <h2>Available Buses</h2>

        <div class="result">
            <!-- hedings of the table -->
            <div class="head-row">
                <span class="col1">Bus No</span>
                <span class="col2">Ratings</span>
                <span class="col3">Arrival</span>
                <span class="col4">Depature</span>
                <span class="col5">Available seats</span>
                <span class="col6">Ticket price</span>
            </div>

            <!-- content of the table -->
            <a href="<?php echo URLROOT; ?>/passenger_book_seats/bus_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                    </span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">13</span>
                    <span class="col6">LKR 1030.00</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_book_seats/bus_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                    </span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">13</span>
                    <span class="col6">LKR 1030.00</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_book_seats/bus_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                    </span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">13</span>
                    <span class="col6">LKR 1030.00</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_book_seats/bus_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                    </span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">13</span>
                    <span class="col6">LKR 1030.00</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_book_seats/bus_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                    </span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">13</span>
                    <span class="col6">LKR 1030.00</span>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/passenger_book_seats/bus_details">
                <div class="row">
                    <span class="col1">NC - 7845</span>
                    <span class="col2">
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star fill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                        <i class="fa-solid fa-star unfill-star"></i>
                    </span>
                    <span class="col3">09:00 am</span>
                    <span class="col4">09:30 am</span>
                    <span class="col5">13</span>
                    <span class="col6">LKR 1030.00</span>
                </div>
            </a>
        </div>

        <div class="btn">
            <button onclick="window.history.back()">Reset</button>
        </div>
    </div>
</body>

</html>