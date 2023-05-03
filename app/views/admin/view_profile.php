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

                <div class="details">

                    <div class="row">
                        <label for="Admin_ID" class="col1">Admin ID: </label>
                        <input type="text" id="Admin_ID" name="Admin_ID" class="col2" value="<?php echo $data['ProfileDetails']->admin_id; ?>">

                    </div>

                    <div class="row">
                        <label for="NIC" class="col1">NIC: </label>
                        <input type="text" id="NIC" name="NIC" class="col2" value="<?php echo $data['ProfileDetails']->nic; ?>">

                    </div>
                    <div class="parent-row">
                        <div class="row">
                            <label for="First_name" class="col1">First Name</label>
                            <input type="text" id="First_name" class="col2" value="<?php echo $data['ProfileDetails']->fname; ?>">
                        </div>

                        <div class="row">
                            <label for="Last_name" ></label>
                            <span class="col1">Last Name: </span>
                            <span class="col2"><?php echo $data['ProfileDetails']->lname; ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <span class="col1">Email: </span>
                        <span class="col2"><?php echo $data['ProfileDetails']->email; ?></span>
                    </div>

                    <div class="row">
                        <span class="col1">Mobile Number: </span>
                        <span class="col2"><?php echo $data['ProfileDetails']->mobileNo; ?></span>
                    </div>

                    <div class="row">
                        <span class="col1">Telephone Number: </span>
                        <span class="col2"><?php echo $data['ProfileDetails']->telNo; ?></span>
                    </div>

                </div>

                <div class="edit-profile-delete-profile-buttons">
                    <div class="btn">
                        <button class="delete">Delete Profile</button>
                        <button class="edit">Edit profile</button></a>
                    </div>

                </div>


            </div>
        </div>
    </div>
</body>

</html>