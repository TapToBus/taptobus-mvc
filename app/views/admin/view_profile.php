<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin-style/view.css">
    <script src="https://kit.fontawesome.com/74174153b4.js" crossorigin="anonymous"></script>
    <title><?php echo SITENAME; ?></title>
</head>

<body>

    <?php require APPROOT . '/views/inc/admin_navbar.php' ?>

    <div class="main">
        
            <h1 class="heading">PROFILE</h1>

            <div class="pro-details">
                <div class="left">
                    <img src="<?php echo URLROOT; ?>/img/profile-pic/AdminProfilePicture.png">
                </div>

                <div class="right">
                    <div class="name"><?php echo $data['profile']->fname . ' ' . $data['profile']->lname; ?></div>

                    <div class="details">

                        <div class="row">
                            <span class="col1">Admin ID: </span>
                            <span class="col2"><?php echo $data['profile']->admin_id ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">NIC: </span>
                            <span class="col2"><?php echo $data['profile']->nic ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Email: </span>
                            <span class="col2"><?php echo $data['profile']->email ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Mobile Number: </span>
                            <span class="col2"><?php echo $data['profile']->mobileNo ?></span>
                        </div>

                        <div class="row">
                            <span class="col1">Telephone Number: </span>
                            <span class="col2"><?php echo $data['profile']->telNo ?></span>
                        </div>

                    </div>

                    <div class="btn">
                        <button class="delete">Delete Profile</button>
                        <a href="<?= URLROOT; ?>/admin_profile/edit_profile"><button class="edit">Edit profile</button></a>

                    </div>
                </div>
            </div>
        

    </div>



    </div>
</body>

</html>