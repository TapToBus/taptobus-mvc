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
                    <!-- <div class="right_top">
                    </div> -->
                    <!-- <div class="right_bottom">
                    </div> -->

                    <!-- <button id="edit-button">Edit Profile</button> -->
                    <div id="edit-form" >
                        <span class="span">
                            <label class = "lbl" for="">Full Name: </label>                       
                            <input type="text" id="profile-name" />
                        </span>
                        <span class="span">
                            <label class = "lbl" for="">email</label>
                            <input type="email" id="profile-email"/>
                        </span>
                        <br>
                      
                        <span class="span">
                            <label class = "lbl" for="">current Password:</label>
                            <input type="password" id="profile-pwdOld"/>
                        </span>
                        <span class="span">
                            <label class = "lbl" for="">New Password:</label>
                            <input type="password" id="profile-pwdNew"/>
                        </span>
                        <span class="span">
                            <label class = "lbl" for="">confirm Password:</label>
                            <input type="password" id="profile-pwdConfirm"/>
                        </span>
                        <span class="P-button">
                            <button>Save</button>
                            <button>cancle</button>
                        </span>
                    </div>

                </div>
            </div>
        </p>  
    </div>
    <script src="<?php echo URLROOT?>/js/staff/staff-profile.js"></script>

</body>
</html>