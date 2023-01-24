<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-style/login-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <div class="left">
        <h2><a href="<?php echo URLROOT; ?>/pages/index">TapToBus</a></h2>
    </div>

    <div class="right">
        <div class="box">
            <h2>Log In</h2>

            <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                <!-- <div class="type">
                    <label for="type">Type:<sup>*</sup></label> <br>
                    <select name="type">
                        <option value="default">Select your type</option>
                        <option value="passenger">Passenger</option>
                        <option value="driver">Driver</option>
                        <option value="conductor">Conductor</option>
                        <option value="owner">Bus Owner</option>
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>
                    </select> <br>
                    <span><?php //echo $data['type_err']; ?></span>
                </div> -->

                <div class="username">
                    <label for="email">Username:<sup>*</sup></label> <br>
                    <input type="email" name="username" placeholder="Enter your username"
                    value="<?php echo $data['username']; ?>" maxlength="255"> <br>
                    <span><?php echo $data['username_err']; ?></span>
                </div>

                <div class="password">
                    <label for="password">Password:<sup>*</sup></label> <br>
                    <input type="password" name="password" placeholder="Enter your password"
                    value="<?php echo $data['password']; ?>" maxlength="10"> <br>
                    <span><?php echo $data['password_err']; ?></span>

                    <div class="forgot-password">
                        <a href="<?php echo URLROOT; ?>/users/forgot_password">Forgot password?</a>
                    </div>
                </div>

                <div class="btn">
                    <button><span></span>Log In</button>
                </div>
            </form>

            <div class="register-link">
                <p>Don't have an account? <a href="<?php echo URLROOT; ?>/users/register_type">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>