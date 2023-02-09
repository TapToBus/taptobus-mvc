<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/style-signup-form.css">

</head>
<body>

    <div class="left">

    </div>

    <div class="right">
        <h1>Registration Form</h1>

        <div class="error" id = "error-box">
            <em id="error"></em>

        </div>

        <form name="signup-form" action="<?php echo URLROOT; ?>/owner_register/register" method="POST" onsubmit="return isValid()">
            <label for="f_name">First name</label> <br>
            <input type="text" name="fname" id="fname" placeholder="Enter first name" value="<?php echo $data['fname']; ?>" required> <br>

            <label for="l_name">Last name</label> <br>
            <input type="text" name="lname" id="lname" placeholder="Enter last name" value="<?php echo $data['lname']; ?>" required> <br>

            <div class="a">
                <label for="nic">NIC</label> <br>
                <input type="text" name="nic" id="nic" placeholder="Enter NIC"  value="<?php echo $data['nic']; ?>" required> <br>
            </div>

            <div class="b">
                <label for="mobile">Mobile No</label> <br>
                <input type="text" name="mobile" id="mobile" placeholder="Enter mobile no" value="<?php echo $data['mobile']; ?>" required> <br>
            </div>

            <br>

            <label for="email">Email</label> <br>
            <input class="email-input" type="email" name="email" id="email" placeholder="Enter email"  value="<?php echo $data['email']; ?>" required>

            <p class="email-note">This will be your username</p>

            <div class="a">
                <label for="password">Password</label> <br>
                <input type="password" name="password" id="password" placeholder="Enter password" value="<?php echo $data['password']; ?>" required>
            </div>

            <div class="b">
                <label for="confirm-password">Confirm password</label> <br>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Re-enter password"  required>
            </div>

            <!--<div class="input-container cta">
                <label class="checkbox-container">
                    <input type="checkbox" name="checkbox" id="checkbox" required>
                    <span class="checkmark"></span>
                    I'm not a robot
                </label>
            </div>-->


        <button>Sign up</button>
        <div class = acc>
        <p> Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Log in</a></p>
        </div>
    </form>

    <script src="./js/signup_validation.js"></script>
</body>
</html>
