<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-style/register-type-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <div class="left">
        <h2><a href="<?php echo URLROOT; ?>/pages/index">TapToBus</a></h2>
    </div>

    <div class="right">
        <div class="box">
            <h2>Register As</h2>

            <form action="<?php echo URLROOT; ?>/users/register_type" method="POST">
                <div class="type">
                    <label for="type">Type:<sup>*</sup></label> <br>
                    <select name="type">
                        <option value="default">Select your type</option>
                        <option value="passenger">Passenger</option>
                        <option value="owner">Bus Owner</option>
                    </select> <br>
                    <span><?php echo $data['type_err']; ?></span>
                </div>

                <div class="btn">
                    <button><span></span>Next</button>
                </div>
            </form>

            <div class="login-link">
                <p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Log in</a></p>
            </div>
        </div>
    </div>
</body>
</html>