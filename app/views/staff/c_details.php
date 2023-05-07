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
            <h1>Conductors</h1>
        </div>
        
        <form class="search" action="<?php echo URLROOT; ?>/Staff_view_users/searchConductor" method="GET">
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
                $results = $data['conductordetails'];
                foreach($results as $conductordetail){
                ?>
                    <tr>
                        <td><?php echo $conductordetail->ntcNo ?></td>
                        <td><?php echo $conductordetail->nic ?></td>
                        <td><?php echo $conductordetail->fname ." " .$conductordetail->lname?></td>                        
                        <td><?php echo $conductordetail->mobileNo?></td>
                        <td><?php echo $conductordetail->email ?></td>
                        <td><?php echo $conductordetail->ratings ?></td>
                        <td><?php echo $conductordetail->responses ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>