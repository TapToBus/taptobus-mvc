<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin-style/view.css">
    <script src="https://kit.fontawesome.com/74174153b4.js" crossorigin="anonymous"></script>
    <title><?php echo SITENAME; ?></title>
</head>

<body>

    <?php require APPROOT . '/views/inc/admin_navbar.php' ?>

    <div class="main">

        <form action="" class="add_new_staff_member_form">
            <h1 class="add_new_staff_member_title">Add staff member</h1>
            <label for="staff_id" class="add_new_staff_member_label">Staff Id</label>
            <input type="text" name="staff_id" class="add_new_staff_member_input">
            <label for="nic" class="add_new_staff_member_label">NIC</label>
            <input type="text" name="nic" class="add_new_staff_member_input">
            <label for="first_name" class="add_new_staff_member_label">First name</label>
            <input type="text" name="first_name" class="add_new_staff_member_input">
            <label for="last_name" class="add_new_staff_member_label">Last name</label>
            <input type="text" name="last_name" class="add_new_staff_member_input">
            <label for="dob" class="add_new_staff_member_label">Date Of Birth</label>
            <input type="text" name="dob" class="add_new_staff_member_input">
            <label for="address" class="add_new_staff_member_label">Address</label>
            <input type="text" name="address" class="add_new_staff_member_input">
            <label for="email" class="add_new_staff_member_label">Email</label>
            <input type="text" name="email" class="add_new_staff_member_input">
            <label for="mobile" class="add_new_staff_member_label">Mobile no</label>
            <input type="text" name="mobile" class="add_new_staff_member_input">
            <label for="tele" class="add_new_staff_member_label">Telephone no</label>
            <input type="text" name="tele" class="add_new_staff_member_input">

            <div class="submit-reset-buttons">
                <div>
                    <input type="submit" name="add" value="ADD" class="add_staff_member_submit_button">
                </div>
                <div>
                    <input type="reset" name="reset" value="BACK" class="add_staff_member_reset_button">
                </div>
            </div>

        </form>





    </div>








</body>

</html>