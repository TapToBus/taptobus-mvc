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

    <?php 
        $active = "Profile";
        require APPROOT . '/views/inc/admin_navbar.php' 
    ?>

    <div class="main">

        <h1 class="heading">PROFILE</h1>

        <div class="pro-details">
            <div class="left">
                <img src="<?php echo URLROOT; ?>/img/profile-pic/AdminProfilePicture.png">
            </div>

            <div class="right">

                <form class="details" action="<?php echo URLROOT?>/Admin_profile/update_profile/<?php echo $data['admin_id']; ?>" method="POST">

                    <div class="row">
                        <label for="Admin_ID" class="col1">Admin ID: </label>
                        <input type="text" id="Admin_ID" name="Admin_ID" class="col2" value="   <?php echo $data['admin_id']; ?>" disabled = "true">

                    </div>

                    <div class="row">
                        <label for="NIC" class="col1">NIC: </label>
                        <input type="text" id="NIC" name="NIC" class="col2" value="   <?php echo $data['nic']; ?>"disabled = "true">

                    </div>
                    <div class="parent-row">
                        <div class="row">
                            <label for="First_name" class="col1">First Name: </label>
                            <input type="text" id="First_name" name="first_name" class="col2" value="   <?php echo $data['firstname']; ?>">
                            <span><?php echo $data['fname_err'] ?></span>
                        </div>

                        <div class="row-1">
                            <label for="Last_name" class="col1">Last Name: </label>
                            <input type="text" id="Last_name"  name="last_name" class="col2" value="   <?php echo $data['lastname']; ?>">
                            <span><?php echo $data['lname_err'] ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <label for="Email" class="col1">Email: </label>
                        <input type="email" id="Email" class="col2" value="   <?php echo $data['email']; ?>" disabled = "true">
                    </div>

                    <div class="row">
                        <label for="Mobile_number" class="col1">Mobile Number: </label>
                        <input type="text" id="Mobile_no" name="mobile" class="col2" value="   <?php echo $data['mobile']; ?>">
                        <span><?php echo $data['mobile_err'] ?></span>

                    </div>

                    <div class="row">
                        <label for="Telephone_number" class="col1">Telephone Number: </label>
                        <input type="text" id="Telephone_no"  name="tele" class="col2" value="   <?php echo $data['tele']; ?>">
                        <span><?php echo $data['tele_err'] ?></span>

                    </div>

                    <div class="edit-profile-buttons">
                        <div class="btn">
                            <button type="submit" class="edit">Edit profile</button></a>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>