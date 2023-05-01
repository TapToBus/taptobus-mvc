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
                        <div class="title">Select seats</div>

                        <!-- <div class="inst">You can select 4 seats</div> -->

                        <form action="" method="POST">
                            <?php $i = 1; ?>
                            <?php while ($i <= 5) : ?>

                                <div class="field">
                                    <span class="col1">
                                        <label for="choice1">Choice <?php echo $i; ?>: </label>
                                    </span>
                                    <span class="col2">
                                        <select name="choice<?php echo $i; ?>">
                                            <?php $s = 1; ?>
                                            <option value="default">Chose from here</option>
                                            <?php while ($s <= 33) : ?>
                                                <option value="s<?php echo $s; ?>"><?php echo $s; ?></option>
                                                <?php $s++; ?>
                                            <?php endwhile; ?>
                                        </select>
                                    </span>
                                </div>

                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <div class="btn">
                                <!-- <button class="btn-left">Back</button>
                                <button class="btn-right">Next</button> -->
                                <input class="btn-left" type="button" value="Back" onclick="goBack()">
                                <input class="btn-right" type="submit" value="Next">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="<?php echo URLROOT; ?>/js/passenger-js/select-seats-js.js"></script> -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>