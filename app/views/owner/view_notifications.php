<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/viewnotifications-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">

        <div>

            <h2 class="header">Notifications</h2>
        </div>

        <div class="new">
          
          <?php
                
                foreach ($data as $row):
               
          ?>
            <div class="card">

                <div class="images">
                <i class="fa-solid fa-user-plus fa-5x" style="color: #000080;"></i>
                </div>
                
                
                <h2><?php echo $row->heading; ?></h2>
               
                <div class="description">

                    <p class="price"><?php echo $row->description; ?></p>
                    
                </div>

                <!-- <div class="btn-div">
                    
                    <a href=""><button class="view">View</button></a>
                </div> -->
            </div>

          <?php
            endforeach;
          ?> 

        </div>

    </div>


</body>

</html>