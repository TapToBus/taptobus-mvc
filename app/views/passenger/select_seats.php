<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/select-seats-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <div class="content">
            <h1 class="heading">Seat Arrangement</h1>

            <div class="details">
                <div class="left">
                    <div class="left-heading">Front</div>

                    <div class="seat-arrangement">
                        <?php $line = 1; ?>
                        <?php $j = 0; ?>

                        <?php while($line <= 7): ?>
                            <div class="row">
                                <span class="col1"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                                <?php $j++; ?>
                                <span class="col2"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                                <?php $j++; ?>
                                <span class="col3"></span>
                                <span class="col4"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                                <?php $j++; ?>
                                <span class="col5"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                            </div>

                            <?php $line++; ?>
                        <?php endwhile; ?>

                        <div class="row">
                            <span class="col1"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                            <?php $j++; ?>
                            <span class="col2"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                            <?php $j++; ?>
                            <span class="col3"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                            <?php $j++; ?>
                            <span class="col4"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                            <?php $j++; ?>
                            <span class="col5"><input type="checkbox" name="s<?php echo $line + $j; ?>" id="s<?php echo $line + $j; ?>" class="seat"></span>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="right-top">
                        <div class="right-top-heading">Summary</div>

                        <div class="right-top-details">
                            <div class="journey">Galle > Makumbura</div>

                            <div class="row">
                                <span class="col1">On:</span>
                                <span class="col2">2023-04-14</span>
                            </div>
                            <div class="row">
                                <span class="col1">At:</span>
                                <span class="col2">10:30 AM</span>
                            </div>
                            <div class="row">
                                <span class="col1">Passenger count:</span>
                                <span class="col2">4</span>
                            </div>
                            <div class="row">
                                <span class="col1">Bus No:</span>
                                <span class="col2">NB-1234</span>
                            </div>
                            <div class="row">
                                <span class="col1">Ticket price:</span>
                                <span class="col2">LKR 5000.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="right-bottom">
                        <div class="right-bottom-heading">Select Seats</div>
                        <div class="description">You can select 4 seats</div>

                        <div class="legend">
                            <span class="col">
                                <span class="squ"><i class="fa-regular fa-square available"></i></span>
                                <span class="desc">Available</span>
                            </span>
                            <span class="col">
                                <span class="squ"><i class="fa-solid fa-square not-available"></i></span>
                                <span class="desc">Not available</span>
                            </span>
                            <span class="col">
                                <span class="squ"><i class="fa-solid fa-square select"></i></span>
                                <span class="desc">Select</span>
                            </span>
                        </div>
                    </div>

                    <div class="btn">
                        <button class="btn-left" onclick="goBack()">Back</button>
                        <button class="btn-right" onclick="goNext('<?php echo $bus_no ?>', '<?php echo $capacity ?>', '<?php echo $schedule_id ?>', '<?php echo $booked_seats_id ?>', '<?php echo $count ?>')">Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/select-seats-js.js"></script>
</body>

</html>