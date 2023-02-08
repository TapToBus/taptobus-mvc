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
            <h2>Log In</h2>

            <!-- login form -->
            <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="username">
                    <label for="email">Username</label> <br>
                    <input type="email" name="username" placeholder="Enter your username" value="<?php echo $data['username']; ?>" maxlength="255"> <br>
                    <span><?php echo $data['username_err']; ?></span>
                </div>

                <div class="password">
                    <label for="password">Password</label> <br>
                    <input type="password" name="password" placeholder="Enter your password" value="<?php echo $data['password']; ?>" maxlength="10"> <br>
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