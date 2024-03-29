<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/edit-profile-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <div class="box">
        <h1 class="heading">Edit Profile</h1>

        <form action="<?php echo URLROOT; ?>/passenger_profile/edit_profile" method="POST">
            <div class="pic">
                <div class="img">
                    <img id="preview" src="<?= URLROOT; ?>/img/profile-pic/<?php echo $data['details']->pic ?>" alt="<?php echo $data['details']->nic; ?>" width="100" height="100"><br>
                    <input type="file" name="pic" id="pic" accept="image/*">
                </div>
            </div>

            <div class="nic">
                <label for="nic">NIC</label> <br>
                <input type="text" name="nic" id="nic" value="<?php echo $data['details']->nic; ?>" readonly>
            </div>

            <div class="fname">
                <label for="fname">First name</label> <br>
                <input type="text" name="fname" id="fname" value="<?php echo $data['details']->fname; ?>">
                <span><?php echo $data['fname_err']; ?></span>
            </div>

            <div class="lname">
                <label for="lname">Last name</label> <br>
                <input type="text" name="lname" id="lname" value="<?php echo $data['details']->lname; ?>">
                <span><?php echo $data['lname_err']; ?></span>
            </div>

            <div class="email">
                <label for="email">Email</label> <br>
                <input type="text" name="email" id="email" value="<?php echo $data['details']->email; ?>" readonly>
            </div>

            <div class="mobile_no">
                <label for="mobile_no">Mobile No</label> <br>
                <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $data['details']->mobile_no; ?>" readonly>
            </div>

            <div class="password">
                <input type="button" value="Change password" id="passwordBtn">
            </div>

            <div class="curr_pwd password-field hidden">
                <label for="curr_pwd">Current password</label> <br>
                <input type="password" name="curr_pwd" id="curr_pwd">
                <span><?php echo $data['curr_pwd_err']; ?></span>
            </div>

            <div class="new_pwd password-field hidden">
                <label for="new_pwd">New password</label> <br>
                <input type="password" name="new_pwd" id="new_pwd" maxlength="10">
                <span><?php echo $data['new_pwd_err']; ?></span>
            </div>

            <div class="confirm_pwd password-field hidden">
                <label for="confirm_pwd">Confirm password</label> <br>
                <input type="password" name="confirm_pwd" id="confirm_pwd" maxlength="10">
                <span><?php echo $data['confirm_pwd_err']; ?></span>
            </div>

            <div class="btn">
                <input class="cancel" type="button" value="Cancel">
                <input class="save" type="submit" value="Save">
            </div>
        </form>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/edit-profile-js.js"></script>
</body>

</html>