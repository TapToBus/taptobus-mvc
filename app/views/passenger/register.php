<?php require APPROOT . '/views/inc/header.php' ?>

<div class="left">
    <h2><a href="<?php echo URLROOT; ?>/common/index">TapToBus</a></h2>
</div>

<div class="right">
    <div class="box">
        <h2>Register</h2>

        <form action="<?php echo URLROOT; ?>/passenger/register" method="POST">
            <div class="fname">
                <label for="fname">First Name:<sup>*</sup></label> <br>
                <input type="text" name="fname" placeholder="Enter your first name" maxlength="25">
            </div>

            <div class="lname">
                <label for="lname">Last Name:<sup>*</sup></label> <br>
                <input type="text" name="lname" placeholder="Enter your last name" maxlength="25">
            </div>

            <div class="nic">
                <label for="nic">NIC:<sup>*</sup></label> <br>
                <input type="text" name="nic" placeholder="Enter your NIC No" maxlength="12">
            </div>

            <div class="email">
                <label for="email">Email:<sup>*</sup></label> <br>
                <input type="email" name="email" placeholder="Enter your email" maxlength="255">
            </div>

            <div class="mobileNo">
                <label for="mobileNo">Mobile No:<sup>*</sup></label> <br>
                <input type="tel" name="mobileNo" placeholder="Enter your mobile no" maxlength="10">
            </div>

            <div class="password">
                <label for="password">Password:<sup>*</sup></label> <br>
                <input type="password" name="password" placeholder="Enter a password" maxlength="10">
            </div>

            <div class="confirmPassword">
                <label for="confirmPassword">Confirm Password:<sup>*</sup></label> <br>
                <input type="password" name="confirmPassword" placeholder="Confirm your password" maxlength="10">
            </div>

            <div class="agree">
                <input type="checkbox" name="agree">
                <label for="agree">By registering, I agree to the 
                    <a href="<?php echo URLROOT; ?>/common/terms_conditions">terms & conditions</a> of the TapToBus</label>
            </div>

            <div class="btn">
                <button><span></span>Register</button>
            </div>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="<?php echo URLROOT; ?>/common/login">Log in</a></p>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php' ?>
