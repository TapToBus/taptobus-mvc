<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/alldetails-style.css" />

</head>

<body>

    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>    

    <div class="container">
        <div class="content-heading">
            <h1>Drivers</h1>
        </div>

        <form class="search" action="<?php echo URLROOT; ?>/Staff_view_users/searchDriver" method="GET">
            <input type="text" id="search" name="search" placeholder="Search Here...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        
        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NTC No</th>
                    <th>NIC</th>
                    <th>Name</th>                    
                    <th>Mobile no</th>
                    <th>Email</th>  
                    <th>Ratings</th>
                    <th>Responses</th> 
                </tr>
                <?php
                $results = $data['driverdetails'];
                foreach ( $results as $driverdetail){
                ?>
                    <tr>
                        <td><?php echo $driverdetail->ntcNo ?></td>
                        <td><?php echo $driverdetail->nic ?></td>
                        <td><?php echo $driverdetail->fname ."  ". $driverdetail->lname ?></td>                        
                        <td><?php echo $driverdetail->mobileNo ?></td>
                        <td><?php echo $driverdetail->email ?></td>    
                        <td><?php echo $driverdetail->ratings ?></td>
                        <td><?php echo $driverdetail->responses ?></td>        
                    </tr>  
                 <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>