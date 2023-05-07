<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffhome-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/staff-style/staffprofile-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ;
        echo($data['profile']);
        die();
    ?>

    <div class="main">
        <div class="content">
            <h1 class="heading">Profile</h1>
            
            <div class="pro-details">
                <!-- <div class="left">
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
                </div> -->
            </div>

            <div class="pro-summary">
                <div class="left">
                   
                </div>

                <div class="right">
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>