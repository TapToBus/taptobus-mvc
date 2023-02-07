<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/bus-details-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <!-- include passenger navbar -->
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <!-- page content -->
    <div class="main">
        <h2>Bus Details</h2>

        <div class="container">
            <div class="bus-img">
                <img src="<?php echo URLROOT; ?>/img/bus-img.jpg" alt="Bus Image">
            </div>

            <div class="details">
                <div class="field1">
                    <span class="col1">Bus No:</span>
                    <span class="col2">NC - 8967</span>
                </div>

                <div class="field2">
                    <div class="row1">
                        <span>Ratings</span>
                    </div>

                    <div class="row2">
                        <span class="col1">Bus:</span>
                        <span class="col2">
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star unfill-star"></i>
                            <i class="fa-solid fa-star unfill-star"></i>
                        </span>
                    </div>

                    <div class="row3">
                        <span class="col1">Driver:</span>
                        <span class="col2">
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star unfill-star"></i>
                            <i class="fa-solid fa-star unfill-star"></i>
                            <i class="fa-solid fa-star unfill-star"></i>
                        </span>
                    </div>

                    <div class="row4">
                        <span class="col1">Conductor:</span>
                        <span class="col2">
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star fill-star"></i>
                            <i class="fa-solid fa-star unfill-star"></i>
                        </span>
                    </div>
                </div>

                <div class="field3">
                    <div class="row1">
                        <span>Facilities</span>
                    </div>

                    <div class="row2">
                        <span class="col1"><i class="fa-solid fa-wifi"></i></span>
                        <span class="col2"><i class="fa-brands fa-usb"></i></span>
                        <span class="col3"><i class="fa-solid fa-plug"></i></span>
                        <!-- <span class="col4"><i class="fa-solid fa-bottle-water"></i></span> -->
                        <!-- <span class="col5"><i class="fa-solid fa-tv"></i></span> -->
                    </div>

                    <div class="row3">
                        <span class="col5"><i class="fa-solid fa-tv"></i></span>
                        <span class="col1"><i class="fa-solid fa-volume-low"></i></span>
                        <span class="col1"><i class="fa-solid fa-snowflake"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn">
            <button class="left" onclick="window.history.back()">Back</button>
            <a href="<?php echo URLROOT; ?>/passenger_book_seats/select_seats"><button class="right">Next</button></a>
        </div>
    </div>
</body>

</html>