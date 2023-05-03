<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/style-signup-form.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <!-- left side of the login page -->
    <div class="left">
        <a href="<?php echo URLROOT; ?>/pages/index">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/logo.png" alt="Logo">
                <p>Expressway buses are now at<br>your fingertips</p>
            </div>
        </a>
    </div>

    <!-- right side of the login page -->
    <div class="right">
        <div class="box">
            <h2>Registration Form<Form></Form></h2>

            <!-- register form -->
            <form action="<?php echo URLROOT; ?>/owner_register/register" method="POST">
                <div class="field1">
                    <div class="fname">
                        <label for="fname">First Name</label> <br>
                        <input type="text" name="fname" placeholder="Enter your first name"
                        value="<?php echo $data['fname']; ?>" maxlength="25"> <br>
                        <span><?php echo $data['fname_err']; ?></span>
                    </div>

                    <div class="lname">
                        <label for="lname">Last Name</label> <br>
                        <input type="text" name="lname" placeholder="Enter your last name"
                        value="<?php echo $data['lname']; ?>" maxlength="25"> <br>
                        <span><?php echo $data['lname_err']; ?></span>
                    </div>
                </div>

                <div class="nic">
                    <label for="nic">NIC</label> <br>
                    <input type="text" name="nic" placeholder="Enter your NIC No"
                    value="<?php echo $data['nic']; ?>" maxlength="12"> <br>
                    <span><?php echo $data['nic_err']; ?></span>
                </div>

                <div class="field2">
                    <div class="email">
                        <label for="email">Email</label> <br>
                        <input type="email" name="email" placeholder="Enter your email"
                        value="<?php echo $data['email']; ?>" maxlength="255"> <br>
                        <span><?php echo $data['email_err']; ?></span>
                    </div>

                    <div class="mobileNo">
                        <label for="mobileNo">Mobile No</label> <br>
                        <input type="tel" name="mobileNo" placeholder="Enter your mobile no"
                        value="<?php echo $data['mobileNo']; ?>" maxlength="10"> <br>
                        <span><?php echo $data['mobileNo_err']; ?></span>
                    </div>
                </div>


                <div class="agree">
                    <div class="inner-field">
                        <input type="checkbox" name="agree">
                        <label for="agree">By registering, I agree to the 
                            <a href="<?php echo URLROOT; ?>/common/terms_conditions">terms & conditions</a> of the TapToBus</label> <br>
                    </div>

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
