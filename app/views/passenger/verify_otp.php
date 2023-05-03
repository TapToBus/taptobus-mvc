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
        <form action="<?php echo URLROOT; ?>/passenger_register/verify_otp?id=<?php echo $_GET['id'] ?>" method="post">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/logo-black.png" alt="Logo" srcset="">
            </div>

            <div class="note">
                <span>We sent you an email to the provided email. Please check it.</span>
            </div>

            <div class="otp">
                <label for="otp">Enter OTP</label> <br>
                <input type="text" name="otp" placeholder="XXXXXX" value="<?php echo $data['otp']; ?>"> <br>
                <span><?php echo $data['otp_err']; ?></span>
            </div>

            <div class="btn">
                <button><span></span>Submit</button>
            </div>
        </form>
    </div>
</body>

</html>