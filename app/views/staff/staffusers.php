<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffusers-style.css" />
</head>
<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>

    <div class="container">      
        <p>  
            <h1>Users</h1>
                <div class="grid-container">
                    <a href= "<?php echo URLROOT; ?>/Staff_view_users/view_passenger" class="grid-items">
                        <i class="fa-solid fa-street-view"></i>
                        <p>Passengers</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_users/view_bus_owner" class="grid-items">
                        <i class="fa-solid fa-person"></i>
                        <p>Bus owners</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_users/view_driver" class="grid-items">
                        <i class="fa-solid fa-user"></i>
                        <p>Drivers</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_users/view_conductor" class="grid-items">
                        <i class="fa-regular fa-user"></i>
                        <p>Conductors</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_users/view_staff" class="grid-items">
                        <i class="fa-solid fa-user-tie"></i>
                        <p>Staff members</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_users/view_bus" class="grid-items">
                        <i class="fa-solid fa-bus"></i>
                        <p>Buses</p> 
                    </a>
                </div>
   
        </p>
    </div>
    
</body>
</html>