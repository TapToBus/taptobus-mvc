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
                    <img src="<?php echo URLROOT; ?>/img/profile-pic/<?php echo $data['profile']->pic; ?>" alt="<?php echo $data['profile']->nic; ?>">
                </div>

                <div class="right">
                    <div class="name"><?php echo $data['profile']->fname . ' ' . $data['profile']->lname; ?></div>

                    <div class="details">
                        <div class="row">
                            <span class="col1">NIC:</span>
                            <span class="col2"><?php echo $data['profile']->nic ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Email:</span>
                            <span class="col2"><?php echo $data['profile']->email ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Mobile No:</span>
                            <span class="col2"><?php echo $data['profile']->mobile_no ?></span>
                        </div>
                    </div>

                    <div class="btn">
                        <button class="delete">Delete profile</button>
                        <a href="<?= URLROOT; ?>/passenger_profile/edit_profile"><button class="edit">Edit profile</button></a>
                    </div>
                </div>
            </div>

            <div class="pro-summary">
                <div class="left">
                    <span class="journeys">
                        <span class="col1">Journeys:</span>
                        <span class="col2"><?php echo isset($data['journeysCount']) ? $data['journeysCount'] : '0'; ?></span>
                    </span>

                    <span class="cancellations">
                        <span class="col1">Cancellations:</span>
                        <span class="col2"><?php echo isset($data['cancelCount']) ? $data['cancelCount'] : '0'; ?></span>
                    </span>
                </div>

                <div class="right">
                    <span class="col1">Upcoming journey:</span>
                    <span class="col2">
                        <?php echo ! empty($data['upcomingJourney']) ? ($data['upcomingJourney']->from . ' > ' . $data['upcomingJourney']->to): '--'; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>