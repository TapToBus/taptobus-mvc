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
            <h1>Buses</h1>
        </div>

        <form class="search" action="<?php echo URLROOT; ?>/Staff_view_users/searchBus" method="GET">
            <input type="text" id="search" name="search" placeholder="Search Here...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        
        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>Bus No</th>
                    <th>Root No</th>
                    <th>Capacity</th>
                    <th>Owner NIC</th>  
                    <th>Ratings</th> 
                    <th>Responses</th> 
                </tr>
                <?php 
                $results = $data['busdetails'];
               
                foreach($results as $busdetail){
            
                ?>
                
                    <tr>

                        <td><?php echo $busdetail->bus_no ?></td>
                        <td><?php echo $busdetail->root_no ?></td>
                        <td><?php echo $busdetail->capacity?></td>
                        <td><?php echo $busdetail->owner_nic?></td>
                        <td><?php echo $busdetail->ratings?></td>
                        <td><?php echo $busdetail->responses?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>