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
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <div class="content">
            <h1 class="heading">Bus Details</h1>

            <div class="top">
                <span class="top-left">
                    <img src="<?php echo URLROOT; ?>/img/bus/<?php echo $data['bus']->bus_image; ?>" alt="<?php echo $data['bus']->bus_no; ?>">
                </span>

                <span class="top-right">
                    <div class="row">
                        <span class="col1">Bus No:</span>
                        <span class="col2"><?php echo $data['bus']->bus_no; ?></span>
                    </div>

                    <div class="row">
                        <span class="col1">Ratings:</span>
                        <span class="col2">
                            <?php $i = 0; ?>

                            <?php while ($i < floor($data['bus']->ratings)) : ?>
                                <i class="fa-solid fa-star star"></i>
                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <?php if ($data['bus']->ratings - (floor($data['bus']->ratings)) > 0) : ?>
                                <i class="fa-regular fa-star-half-stroke star"></i>
                                <?php $i++; ?>
                            <?php endif; ?>

                            <?php while ($i < 5) : ?>
                                <i class="fa-regular fa-star star"></i>
                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <span class="response">(<?php echo $data['bus']->responses; ?>)</span>
                        </span>
                    </div>

                    <div class="row">
                        <span class="col1">Rides:</span>
                        <span class="col2"><?php echo isset($data['bus_rides']->count) ? $data['bus_rides']->count : 0; ?></span>
                    </div>

                    <div class="row">
                        <span class="col1">Capacity:</span>
                        <span class="col2"><?php echo $data['bus']->capacity; ?></span>
                    </div>

                    <div class="row">
                        <span class="col1">Facilities:</span>
                        <span class="col2">
                            <div class="facilities">
                                <!-- <?php if ($data['bus']->ac == 1) : ?>
                                    <i class="fa-solid fa-snowflake"></i>
                                <?php endif; ?> -->

                                <?php if ($data['bus']->tv == 1) : ?>
                                    <i class="fa-solid fa-tv"></i>
                                <?php endif; ?>

                                <!-- <?php if ($data['bus']->sounds == 1) : ?>
                                    <i class="fa-solid fa-volume-high"></i>
                                <?php endif; ?> -->

                                <!-- <?php if ($data['bus']->adj_seats == 1) : ?>
                                    <i class="fa-solid fa-sliders"></i>
                                <?php endif; ?> -->

                                <?php if ($data['bus']->wifi == 1) : ?>
                                    <i class="fa-solid fa-wifi"></i>
                                <?php endif; ?>

                                <?php if ($data['bus']->usb == 1) : ?>
                                    <i class="fa-brands fa-usb"></i>
                                <?php endif; ?>
                            </div>
                        </span>
                    </div>
                </span>
            </div>

            <div class="bottom">
                <span class="bottom-left">
                    <span class="col1">
                        <img src="<?php echo URLROOT; ?>/img/bus/<?php echo $data['driver']->pic; ?>" alt="<?php echo $data['driver']->ntcNo; ?>">
                    </span>

                    <span class="col2">
                        <div class="title">Driver</div>
                        <div class="name"><?php echo $data['driver']->fname . ' ' . $data['driver']->lname; ?></div>
                        <div class="rating">
                            <?php $i = 0; ?>

                            <?php while ($i < floor($data['driver']->ratings)) : ?>
                                <i class="fa-solid fa-star star"></i>
                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <?php if ($data['driver']->ratings - (floor($data['driver']->ratings)) > 0) : ?>
                                <i class="fa-regular fa-star-half-stroke star"></i>
                                <?php $i++; ?>
                            <?php endif; ?>

                            <?php while ($i < 5) : ?>
                                <i class="fa-regular fa-star star"></i>
                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <span class="response">(<?php echo $data['driver']->responses; ?>)</span>
                        </div>
                    </span>
                </span>

                <span class="bottom-right">
                    <span class="col1">
                        <img src="<?php echo URLROOT; ?>/img/bus/<?php echo $data['conductor']->pic; ?>" alt="<?php echo $data['conductor']->ntcNo; ?>">
                    </span>

                    <span class="col2">
                        <div class="title">Conductor</div>
                        <div class="name"><?php echo $data['conductor']->fname . ' ' . $data['conductor']->lname; ?></div>
                        <div class="rating">
                            <?php $i = 0; ?>

                            <?php while ($i < floor($data['conductor']->ratings)) : ?>
                                <i class="fa-solid fa-star star"></i>
                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <?php if ($data['conductor']->ratings - (floor($data['conductor']->ratings)) > 0) : ?>
                                <i class="fa-regular fa-star-half-stroke star"></i>
                                <?php $i++; ?>
                            <?php endif; ?>

                            <?php while ($i < 5) : ?>
                                <i class="fa-regular fa-star star"></i>
                                <?php $i++; ?>
                            <?php endwhile; ?>

                            <span class="response">(<?php echo $data['conductor']->responses; ?>)</span>
                        </div>
                    </span>
                </span>
            </div>

            <div class="btn">
                <button class="left" onclick="goBack()">Back</button>
                <button class="right" 
                onclick="goNext('<?php echo $data['from']; ?>', '<?php echo $data['to']; ?>', '<?php echo $data['date']; ?>', '<?php echo $data['count']; ?>', '<?php echo $data['sch_id']; ?>', '<?php echo $data['boks_id']; ?>', '<?php echo $data['bus_no']; ?>', '<?php echo $data['bus']->capacity; ?>')">Next</button>
            
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/bus-details-js.js"></script>
</body>

</html>