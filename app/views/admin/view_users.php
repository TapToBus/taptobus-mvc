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

    <div class="container">
        <p>
            <!-- <div class="content-heading">
                <h1>Remove users</h1>
                <hr>
            </div> -->

        <h1>USERS</h1>

        <div class="grid-container">

            <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_passenger" class="grid-items">
                <i class="fa-solid fa-id-badge"></i>
                <p>passengers</p>
            </a>

            <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_bus_owner" class="grid-items">
                <i class="fa-solid fa-person"></i>
                <p>Bus owners</p>
            </a>
            <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_bus_driver" class="grid-items">
                <i class="fa-solid fa-user"></i>
                <p>Drivers</p>
            </a>
            <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_bus_conductor" class="grid-items">
                <i class="fa-regular fa-user"></i>
                <p>Conductors</p>
            </a>
            <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_staff_member" class="grid-items">
                <i class="fa-solid fa-user-tie"></i>
                <p>Staff members</p>
            </a>
            <!-- <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_bus" class="grid-items">
                <i class="fa-solid fa-bus"></i>
                <p>Buses</p>
            </a> -->
        </div>
        </p>
    </div>

</body>

</html>