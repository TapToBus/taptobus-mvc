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

                    <?php while ($line <= ($data['bus']->capacity - 5) / 4) : ?>
                        <div class="row">
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat">
                                    <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                                </span>
                                <?php $j++; ?>
                            </span>
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat">
                                    <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                                </span>
                                <?php $j++; ?>
                            </span>
                            <span class="col">

                            </span>
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat">
                                    <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                                </span>
                                <?php $j++; ?>
                            </span>
                            <span class="col">
                                <span class="snum"><?php echo $line + $j; ?></span>
                                <span class="seat">
                                    <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                                </span>
                            </span>
                        </div>
                        <?php $line++; ?>
                    <?php endwhile; ?>

                    <div class="row">
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat">
                                <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                            </span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat">
                                <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                            </span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat">
                                <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                            </span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat">
                                <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                            </span>
                            <?php $j++; ?>
                        </span>
                        <span class="col">
                            <span class="snum"><?php echo $line + $j; ?></span>
                            <span class="seat">
                                <i class="fas fa-square <?php echo ($data['seats']->{'s' . ($line + $j)} != '0') ? 'not_available' : ''; ?>"></i>
                            </span>
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

                        <?php if(! empty($data['err'])): ?>
                            <div class="err"><?php echo $data['err'] ?></div>
                        <?php endif; ?>

                        <form action="<?php echo URLROOT; ?>/passenger_book_seats/select_seats" method="post">
                            <?php $i = 1; ?>
                            <?php while ($i <= $data['count']) : ?>

                                <div class="field">
                                    <span class="col1">
                                        <label for="choice<?php echo $i; ?>">Seat <?php echo $i; ?>: </label>
                                    </span>
                                    <span class="col2">
                                        <select name="choice<?php echo $i; ?>">
                                            <?php $s = 0; ?>
                                            <option value="default">Chose from here</option>
                                            <?php while ($s < ($data['bus']->capacity)) : ?>
                                                <?php $s++; ?>
                                                <?php if ($data['seats']->{'s' .  $s} != 0) continue; ?>
                                                <option value="s<?php echo $s; ?>"><?php echo $s; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </span>
                                </div>

                                <?php $i++; ?>
                            <?php endwhile; ?>


                            <!-- hidden input fields -->
                            <input type="hidden" name="sch_id" value="<?php echo $data['sch_id']; ?>">
                            <input type="hidden" name="boks_id" value="<?php echo $data['boks_id']; ?>">
                            <input type="hidden" name="count" value="<?php echo $data['count']; ?>">
                            <!--  -->


                            <div class="btn">
                                <button class="btn-left" onclick="goBack()" type="button">Back</button>
                                <button class="btn-right" type="submit">Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/select-seats-js.js"></script>
</body>
</html>