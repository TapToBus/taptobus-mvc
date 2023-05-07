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

        <form action="<?php echo URLROOT?>/Admin_add_staff_member/insert_new_staff_member " method="POST"class="add_new_staff_member_form">
            <h1 class="add_new_staff_member_title">ADD NEW STAFF MEMBER</h1>

            <label for="staff_id" id="staff_id" class="add_new_staff_member_label">Staff Id</label>
            <input type="text" name="staff_id" id="staffid" class="add_new_staff_member_input">


            <label for="nic" class="add_new_staff_member_label">NIC</label>
            <input type="text" name="nic" id="nic" class="add_new_staff_member_input">
            <span class="admin-form-errors"><?php echo $data['nic_err'] ?></span>

            <label for="first_name" class="add_new_staff_member_label">First name</label>
            <input type="text" id="firstname" name="first_name" class="add_new_staff_member_input">
            <span><?php echo $data['fname_err'] ?></span>

            <label for="last_name" class="add_new_staff_member_label">Last name</label>
            <input type="text" id="lastname" name="last_name" class="add_new_staff_member_input">
            <span><?php echo $data['lname_err'] ?></span>

            <label for="dob" class="add_new_staff_member_label">Date Of Birth</label>
            <input type="date" id="dob" name="dob" class="add_new_staff_member_input">

            <label for="email" class="add_new_staff_member_label">Email</label>
            <input type="email" id="email" name="email" class="add_new_staff_member_input">
            <span><?php echo $data['email_err'] ?></span>

            <label for="mobile" class="add_new_staff_member_label">Mobile no</label>
            <input type="text" id="mobile" name="mobile" class="add_new_staff_member_input">
            <span><?php echo $data['mobile_err'] ?></span>

            <label for="tele" class="add_new_staff_member_label">Telephone no</label>
            <input type="text" id="tele" name="tele" class="add_new_staff_member_input">
            <span><?php echo $data['tele_err'] ?></span>

            <div class="submit-reset-buttons">
                <div>
                    <input type="submit" name="add" value="ADD" class="add_staff_member_submit_button">
                </div>
                <div>
                    <input type="reset" name="reset" value="RESET" class="add_staff_member_reset_button">
                </div>
            </div>

        </form>





    </div>








</body>

</html>