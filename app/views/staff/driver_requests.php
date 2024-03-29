<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/allrequests-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
</head>

<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>

    <div class="container">
        <p>
          
            <h2>Pending Bus Driver Requests </h2>
            <div class="result">
                <?php
                     $result =  $data['driverRequests'];

                     foreach ($result as $driverRequest){                
                ?>
                    <div class="row">
                        <div class="data">
                            <span class="row1"><?php echo $driverRequest->driver_ntc?></span>       
                            <span class="date"><?php echo $driverRequest->date?></span> 
                            <span class="time"><?php echo $driverRequest->time?></span> 
                        </div>               
                        
                        <a href="<?php echo URLROOT?>/Staff_view_requests/driver_requests_details?nic=<?php echo $driverRequest->driver_ntc?>">
                        <span class="Vbutton">View</span>
                        </a>                      
                    </div> 

                <?php
                    }
                ?>     
            </div>        
        </p>
    </div>
</body>

</html>
     
