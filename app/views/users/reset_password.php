<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/verify-otp-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <div class="box">
        <form action="<?php echo URLROOT; ?>/users/reset_password" method="post">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/logo-black.png" alt="Logo" srcset="">
            </div>

            <div class="otp">   <!-- keep this! -->
                <label for="new-pass">New password</label> <br>
                <input type="password" name="new_pwd" placeholder="Enter a new password" 
                    value="<?php echo $data['new_pwd']; ?>" maxlength="10"> <br>
                <span><?php echo $data['new_pwd_err']; ?></span>
            </div>

            <div></div>

            <div class="otp new-field">   <!-- keep this! -->
                <label for="confirm-pass">Confirm password</label> <br>
                <input type="password" name="confirm_pwd" placeholder="Confirm the password" 
                    value="<?php echo $data['confirm_pwd']; ?>" maxlength="10"> <br>
                <span><?php echo $data['confirm_pwd_err']; ?></span>
            </div>

            <div class="btn">
                <button><span></span>Submit</button>
            </div>
        </form>
    </div>
</body>

</html>