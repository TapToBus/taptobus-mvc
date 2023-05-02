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
            <h1>Bus Owners</h1>
        </div>

        <form action="" method="post">
            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <Button><i class="fas fa-search"></i></Button>
            </div> 
        </form>       

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NIC</th>
                    <th>Name</th>                    
                    <th>Mobile no</th>
                    <th>Email</th>   
                </tr>
                <?php
                $results = $data['busOwnerdetails'];
                foreach($results as $busOwnerdetial){
                ?>
                <tr>
                    <td><?php echo $busOwnerdetial->nic ?></td>
                    <td><?php echo $busOwnerdetial->fname ."  ". $busOwnerdetial->lname ?></td>
                    <td><?php echo $busOwnerdetial->mobileNo?></td>
                    <td><?php echo $busOwnerdetial->email ?></td>
                </tr>
                <?php
                }
                ?>              
            </table>
        </div>
    </div>
</body>

</html>