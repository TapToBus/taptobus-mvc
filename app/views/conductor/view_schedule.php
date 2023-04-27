<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/conductor-style/view_schedule-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/conductor_navbar.php' ?>

    <div class="container">

        <div class="table">

            <div class="row header">
                <div>Bus_no</div>
                <div>From</div>
                <div>To</div>
                <div>Date</div>
                <div>Departure Time</div>
                <div>Arrival Time</div>
            </div>

            <?php
                foreach($data as $row):
            ?>

            <div class="row">
                <div><?php echo $row->bus_no; ?></div>
                <div><?php echo $row->Location_from; ?></div>
                <div><?php echo $row->Location_to; ?></div>
                <div><?php echo $row->day; ?></div>
                <div><?php echo $row->departure_time; ?></div>
                <div><?php echo $row->arrival_time; ?></div>
                <div><button class="btn">Book Now</button></div>
            </div>

            <?php
               endforeach;
            ?>


        </div>
    </div>


</body>

</html>