<?php require APPROOT . '/views/inc/header.php' ?>

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
                    <option value="" disabled selected>Select your type</option>
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

<?php require APPROOT . '/views/inc/footer.php' ?>