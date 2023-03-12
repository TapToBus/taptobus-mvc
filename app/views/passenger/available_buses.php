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
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <h1 class="heading">Available Buses</h1>

        <div class="summary">
            <span class="col1">
                <span class="sub-col1">Journey:</span> 
                <span class="sub-col2"><?php echo $data['from'] ?> > <?php echo $data['to'] ?></span>
            </span>
            <span class="v-line">|</span>
            <span class="col2">
                <span class="sub-col1">On:</span> 
                <span class="sub-col2"><?php echo $data['date'] ?></span>
            </span>
            <span class="v-line">|</span>
            <span class="col3">
                <span class="sub-col1">Passenger count:</span> 
                <span class="sub-col2"><?php echo $data['count'] ?></span>
            </span>
        </div>

        <div class="title">
            <span class="title1">Bus No</span>
            <span class="title2">Ratings</span>
            <span class="title3">Depature</span>
            <span class="title4">Available Seats</span>
            <span class="title5">Ticket Price</span>
        </div>

        <!-- <div class="no-data">
            <i class="fa-solid fa-circle-exclamation"></i> <br>
            <span>No buses to display</span>
        </div> -->

        <div class="result">
            <span class="result1">NC-8965</span>
            <span class="result2">
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <span class="result3">09:30</span>
            <span class="result4">12</span>
            <span class="result5">LKR 1030.00</span>
        </div>

        <div class="result">
            <span class="result1">NC-8965</span>
            <span class="result2">
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <span class="result3">09:30</span>
            <span class="result4">12</span>
            <span class="result5">LKR 30.00</span>
        </div>

        <div class="result">
            <span class="result1">NC-8965</span>
            <span class="result2">
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star fill-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <span class="result3">09:30</span>
            <span class="result4">12</span>
            <span class="result5">LKR 930.00</span>
        </div>

        <div class="btn">
            <button onclick="goBack()">Reset</button>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/available-buses-js.js"></script>
</body>

</html>