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
    <!-- <div class="upbar">
        <div class="logo">
            <img src="Taptobus.png" alt="site logo">

        </div>

        <div class="profile_activation">

        </div>

        <div class="up_drop_down">
            <i class="fa-duotone fa-grid-2"></i>
        </div>
    </div>
    <div class="down-block">
        <div class="sidebar">
            

        </div> -->
    <?php require APPROOT . '/views/inc/admin_navbar.php' ?>
    
    <div class="main">
        <div class="content-heading">
            <h1>Passengers</h1>
            <hr>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>Passenger ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>NIC</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- </div> -->


</body>

</html>