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
                <div>From</div>
                <div>To</div>
                <div>Time</div>
                <div>Bus No</div>
                <div>Action</div>
            </div>

            <?php
                foreach($data as $row):
            ?>

            <div class="row">
                <div><?php echo $row->date; ?></div>
                <div>Boston</div>
                <div>8:00 AM</div>
                <div>123</div>
                <div><button class="btn">Book Now</button></div>
            </div>

            <?php
               endforeach;
            ?>


        </div>
    </div>


</body>

</html>