<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/register-form-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <div class="left">
        <h2><a href="<?php echo URLROOT; ?>/pages/index">TapToBus</a></h2>
    </div>

    <div class="right">
        <div class="box">
            <h2>Register</h2>

            <form action="<?php echo URLROOT; ?>/passenger_register/register" method="POST">
                <div class="fname">
                    <label for="fname">First Name:<sup>*</sup></label> <br>
                    <input type="text" name="fname" placeholder="Enter your first name"
                    value="<?php echo $data['fname']; ?>" maxlength="25"> <br>
                    <span><?php echo $data['fname_err']; ?></span>
                </div>

                <div class="lname">
                    <label for="lname">Last Name:<sup>*</sup></label> <br>
                    <input type="text" name="lname" placeholder="Enter your last name"
                    value="<?php echo $data['lname']; ?>" maxlength="25"> <br>
                    <span><?php echo $data['lname_err']; ?></span>
                </div>

                <div class="nic">
                    <label for="nic">NIC:<sup>*</sup></label> <br>
                    <input type="text" name="nic" placeholder="Enter your NIC No"
                    value="<?php echo $data['nic']; ?>" maxlength="12"> <br>
                    <span><?php echo $data['nic_err']; ?></span>
                </div>

                <div class="email">
                    <label for="email">Email:<sup>*</sup></label> <br>
                    <input type="email" name="email" placeholder="Enter your email"
                    value="<?php echo $data['email']; ?>" maxlength="255"> <br>
                    <span><?php echo $data['email_err']; ?></span>
                </div>

                <div class="mobileNo">
                    <label for="mobileNo">Mobile No:<sup>*</sup></label> <br>
                    <input type="tel" name="mobileNo" placeholder="Enter your mobile no"
                    value="<?php echo $data['mobileNo']; ?>" maxlength="10"> <br>
                    <span><?php echo $data['mobileNo_err']; ?></span>
                </div>

                <div class="password">
                    <label for="password">Password:<sup>*</sup></label> <br>
                    <input type="password" name="password" placeholder="Enter a password"
                    value="<?php echo $data['password']; ?>" maxlength="10"> <br>
                    <span><?php echo $data['password_err']; ?></span>
                </div>

                <div class="confirmPassword">
                    <label for="confirmPassword">Confirm Password:<sup>*</sup></label> <br>
                    <input type="password" name="confirmPassword" placeholder="Confirm password"
                    value="<?php echo $data['confirmPassword']; ?>" maxlength="10"> <br>
                    <span><?php echo $data['confirmPassword_err']; ?></span>
                </div>

                <div class="agree">
                    <input type="checkbox" name="agree">
                    <label for="agree">By registering, I agree to the 
                        <a href="<?php echo URLROOT; ?>/common/terms_conditions">terms & conditions</a> of the TapToBus</label> <br>
                    <span><?php echo $data['agree_err']; ?></span>
                </div>

                <div class="btn">
                    <button><span></span>Register</button>
                </div>
            </form>

            <div class="login-link">
                <p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Log in</a></p>
            </div>
        </div>
    </div>
</body>
</html>
