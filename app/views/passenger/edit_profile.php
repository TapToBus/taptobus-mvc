<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/edit-profile-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <div class="box">
        <h1 class="heading">Edit Profile</h1>

        <form action="<?php echo URLROOT; ?>/passenger_profile/edit_profile" method="POST">
            <div class="pic">
                <div class="img">
                    <img id="preview" src="<?= URLROOT; ?>/img/profile-pic/default.jpg" alt="<?php echo $data['details']->nic; ?>" width="100" height="100"><br>
                    <input type="file" name="pic" id="pic" accept="image/*">
                </div>
            </div>

            <div class="nic">
                <label for="nic">NIC</label> <br>
                <input type="text" name="nic" id="nic" value="<?php echo $data['details']->nic; ?>">
            </div>

            <div class="fname">
                <label for="fname">First name</label> <br>
                <input type="text" name="fname" id="lname" value="<?php echo $data['details']->fname; ?>">
            </div>

            <div class="lname">
                <label for="lname">Last name</label> <br>
                <input type="text" name="lname" id="lname" value="<?php echo $data['details']->lname; ?>">
            </div>

            <div class="email">
                <label for="email">Email</label> <br>
                <input type="text" name="email" id="email" value="<?php echo $data['details']->email; ?>">
            </div>

            <div class="mobile_no">
                <label for="mobile_no">Mobile No</label> <br>
                <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $data['details']->mobile_no; ?>">
            </div>

            <div class="password">
                <input type="button" value="Change password">
            </div>

            <div class="btn">
                <input class="cancel" type="button" value="Cancel">
                <input class="save" type="submit" value="Save">
            </div>
        </form>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/edit-profile-js.js"></script>
</body>

</html>