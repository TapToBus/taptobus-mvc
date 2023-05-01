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

                    <div class="seats">
                        <!-- <?php $line = 1;
                                $j = 0; ?>
                        <?php while ($line <= (33 - 5) / 4) : ?>
                            <div class="row">
                                <span class="seat col1"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                                <?php $j++; ?>
                                <span class="seat col2"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                                <?php $j++; ?>
                                <span class="seat col3"></span>
                                <span class="seat col4"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                                <?php $j++; ?>
                                <span class="seat col5"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                            </div>
                            <?php $line++; ?>
                        <?php endwhile; ?>
                        <div class="row">
                            <span class="seat col1"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                            <span class="seat col2"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                            <span class="seat col3"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                            <span class="seat col4"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                            <?php $j++; ?>
                            <span class="seat col5"><?php echo $line + $j; ?><i class="fas fa-square"></i></span>
                        </div> -->

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
                                    <!--  -->
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
                </div>

                <div class="right">
                    <h1>Hello</h1>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/select-seats-js.js"></script>
</body>

</html>