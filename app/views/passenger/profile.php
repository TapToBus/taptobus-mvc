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
        <div class="main-box">
            <h1 class="heading">Profile</h1>

            <div class="content">
                <div class="left">
                    <div class="field1">
                        <div class="pic">
                            <img src="<?php echo URLROOT; ?>/img/profile-pic/<?php echo $data['proDetails']->pic; ?>" alt="Profile Pic">
                        </div>
                    </div>

                    <div class="field2">
                        <div class="name"><?php echo $data['proDetails']->fname . ' ' . $data['proDetails']->lname; ?></div>

                        <div class="row">
                            <span class="col1">NIC:</span>
                            <span class="col2"><?php echo $data['proDetails']->nic; ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Email:</span>
                            <span class="col2"><?php echo $data['proDetails']->email; ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Mobile No:</span>
                            <span class="col2"><?php echo $data['proDetails']->mobile_no; ?></span>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="box1">
                        <div class="title">Summary</div>

                        <div class="row">
                            <span class="col1">Total bookings:</span>
                            <span class="col2"><?php echo $data['totBookings']->count; ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Total journies:</span>
                            <span class="col2"><?php echo $data['totJourneies']->count; ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Total cancelations:</span>
                            <span class="col2"><?php echo $data['totBookings']->count - $data['totJourneies']->count; ?></span>
                        </div>
                    </div>

                    <div class="box2">
                        <div class="title">Bookings</div>

                        <div class="field1">
                            <div class="row">
                                <span class="col1">Recent:</span>
                                    <span class="col2"><?php echo $data['recentBooking']->from; ?> > <?php echo $data['recentBooking']->to; ?></span>
                            </div>

                            <div class="row">
                                <span class="col1">On:</span>
                                <span class="col2"><?php echo $data['recentBooking']->date; ?></span>
                            </div>

                            <div class="row">
                                <span class="col1">At:</span>
                                <span class="col2"><?php echo $data['recentBooking']->departure_time; ?></span>
                            </div>
                        </div>

                        <hr>

                        <div class="field2">
                            <div class="row">
                                <span class="col1">Previous:</span>
                                <span class="col2"><?php echo $data['recentHistory']->from; ?> > <?php echo $data['recentHistory']->to; ?></span>
                            </div>

                            <div class="row">
                                <span class="col1">On:</span>
                                <span class="col2"><?php echo $data['recentHistory']->date; ?></span>
                            </div>

                            <div class="row">
                                <span class="col1">Status:</span>
                                <span class="col2"><?php echo $data['recentHistory']->status; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn">
                <button class="delete">Delete</button>
                <button class="edit">Edit</button>
            </div>
        </div>
    </div>
</body>

</html>