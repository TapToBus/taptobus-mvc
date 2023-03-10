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
            <h2>Pending Bus Requests </h2>
            <div class="result">
                    <?php 
                        $results = $data['busRequests'];

                        foreach ($results as $busRequest){
                            ?>
                            <div class="row">
                            <!-----this part should repeat ( according to the no of rows in request table)------>
                            <div class="data">
                                <span class="row1"> <?php echo $busRequest->bus_no?></span>        
                                <span class="date">2023/01/07</span> 
                            </div>               
                            <span class="Vbutton">
                                <a href="<?php echo URLROOT?>/Staff_view_requests/bus_requests_details?bus_no=<?php echo $busRequest->bus_no?>">View</a>
                            </span>
                            <!-- ------------------------------------------------------------------------------>
                            </div>  
                        <?php
                        }
                     ?>
                     
            </div>        
        </p>
    </div>
</body>

</html>
     
