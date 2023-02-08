<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffprofile-style.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />


</head>
<body>
    <?php require  APPROOT . '/views/inc/staff_navbar.php'?>
    <div class="container">
        <p>
            <div class="main_details">
                <div class="main_left">
                    <div class="profile_pic">
                        <img src="<?php echo URLROOT?>/img/profile.jpeg" alt="" srcset="" id="photo">
                        <!-- <label for="file" id="uploadBtn"><i class="fa-solid fa-pen-to-square"></i></label>
                        <input type="file" id="file"> -->
                    </div>
                    <p class="usr_name"><?php echo $_SESSION['user_fname'] ;?></p>
                        <hr>
                    <div class="info">
                        <label for=""><b>Staff No:&nbsp </b> staff001</label>
                        <label for=""><b>NIC:&nbsp</b> 988170097V</label>
                        <label for=""><b>DOB:&nbsp</b>  1998/11/12</label>
                        <label for=""><b>Email:&nbsp</b> dasuni@gmail.com</label>
                    </div>
                </div>
                <div class="main_right">
                    <div class="right_top">
                        

                    </div>
                    <div class="right_bottom">

                    </div>
                </div>
            </div>
        </p>
        
    </div>

    <script src="<?php echo URLROOT?>/js/upload_profile.js"></script>
</body>
</html>