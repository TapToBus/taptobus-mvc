<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/viewconductors-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">

        <div>
            <a href="<?php echo URLROOT; ?>/owner_conductors/register_conductor"><button class="addbtn">Add Conductor</button></a>
        </div>
       
         <div>

         <h2>Conductors</h2>
         </div>

        <div class="new">

           <?php
                
                foreach ($data as $row):

           ?>
            
                <div class="card">
                    <div class="images">
                        <img src="<?php echo URLROOT; ?>/img/owner_img/con3.jpg" alt="">
                    </div>

                    <div class="caption">

                        <p class="product_name">Name - <?php echo $row->fname; ?></p>
                        <p class="price">NTC No - <?php echo $row->ntcNo; ?></p>
                        
                        <a href="<?php echo URLROOT; ?>/owner_conductors/conductor_details?con_id=<?php echo $row->ntcNo;?>"><button class="view" >View</button> </a>
                    </div>
                </div>

            <?php
                
                 endforeach;
                
            ?>   


        </div>

    </div>

</body>

</html>