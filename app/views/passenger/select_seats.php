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
                    <div class="front">Front</div>

                    <?php $line = 1;
                    $j = 0; ?>

                    <?php while ($line <= (33 - 5) / 4) : ?>
                        <div class="row">
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat"><i class="fas fa-square"></i></span>
                                <?php $j++; ?>
                            </span>
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat"><i class="fas fa-square"></i></span>
                                <?php $j++; ?>
                            </span>
                            <span class="col">
                                
                            </span>
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat"><i class="fas fa-square"></i></span>
                                <?php $j++; ?>
                            </span>
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat"><i class="fas fa-square"></i></span>
                            </span>
                        </div>
                    <?php $line++; ?>
                    <?php endwhile; ?>

                    <div class="row">
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat"><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat"><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat"><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat"><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat"><i class="fas fa-square"></i></span>
                        </span>
                    </div>
                </div>

                <div class="right">
                    <div class="legend">
                        <span class="col">
                            <i class="fas fa-square"></i>
                            <span>Available</span>
                        </span>

                        <span class="col">
                            <i class="fas fa-square booked"></i>
                            <span>Unavailable</span>
                        </span>
                    </div>

                    <div class="form">
                        <div>Select seats</div>

                        <form action="">
                            <label for="seat1">Seat 1: </label>
                            <select name="s1" id="s1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> <br>

                            <div class="btn">
                                <button class="btn-left">Back</button>
                                <button class="btn-right">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="<?php echo URLROOT; ?>/js/passenger-js/select-seats-js.js"></script> -->
</body>

</html>