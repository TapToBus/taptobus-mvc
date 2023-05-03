<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-style/forgot-password.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <div class="box">
        <form action="<?php echo URLROOT; ?>/users/forgot_password" method="post">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/logo-black.png" alt="Logo" srcset="">
            </div>

            <div class="email">
                <label for="email">Email</label> <br>
                <input type="text" name="email" placeholder="Enter your email" value="<?php echo $data['email']; ?>"> <br>
                <span><?php echo $data['email_err']; ?></span>
            </div>

            <div class="btn">
                <button><span></span>Submit</button>
            </div>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="<?php echo URLROOT; ?>/users/register_type">Register</a></p>
        </div>
    </div>
</body>

</html>