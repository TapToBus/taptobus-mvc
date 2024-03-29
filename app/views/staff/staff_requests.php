<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffrequest-style.css" />
</head>
<body>
    <?php 
         $active = "requests";
        require APPROOT . '/views/inc/staff_navbar.php';
        $ownercount = $data['ownercount'];
        $conductorcount  = $data['conductorcount'];
        $drivercount = $data['drivercount'];
        $buscount = $data['buscount'];
     ?>
     
    <div class="container">      
        <p>  
            <h1>Pending Requests</h1>
                <div class="grid-container">
                  
                    <a href= "<?php echo URLROOT; ?>/Staff_view_requests/owner_requests" class="grid-items">
                        <span class = "icon-button__badge"><?php echo $ownercount?></span>
                        <i class="fa-solid fa-person"></i>
                        <p>Bus owners</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_requests/driver_requests" class="grid-items">
                        <span class = "icon-button__badge"><?php echo $drivercount?></span>
                        <i class="fa-solid fa-user"></i>
                        <p>Drivers</p> 
                    </a>
                    <a href= "<?php echo URLROOT; ?>/Staff_view_requests/conductor_requests" class="grid-items">
                        <span class = "icon-button__badge"><?php echo $conductorcount?></span>
                        <i class="fa-regular fa-user"></i>
                        <p>Conductors</p> 
                    </a>
                
                    <a href= "<?php echo URLROOT; ?>/Staff_view_requests/bus_requests" class="grid-items">
                        <span class = "icon-button__badge"><?php echo $buscount?></span>
                        <i class="fa-solid fa-bus"></i>
                        <p>Buses</p> 
                    </a>
                </div>    
        </p>
    </div>
    
</body>
</html>