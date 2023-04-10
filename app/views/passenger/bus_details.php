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
                    <!-- <img src="<?php echo URLROOT; ?>/img/bus/bus-img1.jpg" alt="bus_no"> -->
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
                        <span class="col2">201</span>
                    </div>

                    <div class="row">
                        <span class="col1">Capacity:</span>
                        <span class="col2"><?php echo $data['bus']->capacity; ?></span>
                    </div>

                    <div class="row">
                        <span class="col1 facilities">Facilities:</span>
                        <span class="col2">
                            <?php $i = 0; ?>

                            <!-- <div class="sub-row">
                                <i class="fa-solid fa-wifi"></i>
                                <i class="fa-solid fa-tv"></i>
                                <i class="fa-brands fa-usb"></i>
                                <i class="fa-solid fa-sliders"></i>
                            </div>

                            <div class="sub-row">
                                <i class="fa-solid fa-snowflake"></i>
                                <i class="fa-solid fa-volume-high"></i>
                            </div> -->
                        </span>
                    </div>
                </span>
            </div>

            <div class="bottom">
                <span class="bottom-left">
                    <span class="col1">
                        <img src="<?php echo URLROOT; ?>/img/bus/bus-img1.jpg" alt="bus_no">
                    </span>

                    <span class="col2">
                        <div class="title">Driver</div>
                        <div class="name">Adheesha Chamod</div>
                        <div class="rating">
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-regular fa-star-half-stroke star"></i>
                            <i class="fa-regular fa-star star"></i>
                            <span class="response">(100)</span>
                        </div>
                    </span>
                </span>

                <span class="bottom-right">
                    <span class="col1">
                        <img src="<?php echo URLROOT; ?>/img/bus/bus-img1.jpg" alt="bus_no">
                    </span>

                    <span class="col2">
                        <div class="title">Conductor</div>
                        <div class="name">Adheesha Chamod</div>
                        <div class="rating">
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-regular fa-star-half-stroke star"></i>
                            <i class="fa-regular fa-star star"></i>
                            <span class="response">(100)</span>
                        </div>
                    </span>
                </span>
            </div>

            <div class="btn">
                <button class="left">Back</button>
                <button class="right">Next</button>
            </div>
        </div>
    </div>

    <script src=""></script>
</body>

</html>