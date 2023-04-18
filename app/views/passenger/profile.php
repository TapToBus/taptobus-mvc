<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/profile-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <div class="content">
            <h1 class="heading">Profile</h1>

            <div class="pro-details">
                <div class="left">
                    <img src="<?php echo URLROOT; ?>/img/profile-pic/992166398V.jpg" alt="">
                </div>

                <div class="right">
                    <div class="name">Adheesha Chamod</div>

                    <div class="details">
                        <div class="row">
                            <span class="col1">NIC:</span>
                            <span class="col2">992166398V</span>
                        </div>

                        <div class="row">
                            <span class="col1">Email:</span>
                            <span class="col2">adheesha@gmail.com</span>
                        </div>

                        <div class="row">
                            <span class="col1">Mobile No:</span>
                            <span class="col2">0779293569</span>
                        </div>
                    </div>

                    <div class="btn">
                        <button class="edit">Edit profile</button>
                        <button class="delete">Delete profile</button>
                    </div>
                </div>
            </div>

            <div class="pro-summary">
                <div class="left">
                    <span class="journeys">
                        <span class="col1">Journeys:</span>
                        <span class="col2">234</span>
                    </span>

                    <span class="cancellations">
                        <span class="col1">Cancellations:</span>
                        <span class="col2">3</span>
                    </span>
                </div>

                <div class="right">
                    <span class="col1">Upcoming journey:</span>
                    <span class="col2">Galle > Makumbura</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>