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
            <a href="<?php echo URLROOT; ?>/owner_conductors/view_conductors"><button class="addbtn">Add Conductor</button></a>
        </div>
       
         <div>

         <h2>Conductors</h2>
         </div>

        <div class="new">


                <div class="card">
                    <div class="images">
                        <img src="<?php echo URLROOT; ?>/img/owner_img/con3.jpg" alt="">
                    </div>

                    <div class="caption">

                        <p class="product_name">Name - Chamath</p>
                        <p class="price">NTC No - CB301</p>
                        <a href="<?php echo URLROOT; ?>/owner_conductors/conductor_details"> <button class="view" >View</button> </a>
                    </div>
                </div>

                <div class="card">
                    <div class="images">
                        <img src="<?php echo URLROOT; ?>/img/owner_img/con2.jpg" alt="">
                    </div>

                    <div class="caption">

                        <p class="product_name">Name - Nadeemal</p>
                        <p class="price">NTC No - CB302</p>
                        <a href="<?php echo URLROOT; ?>/owner_conductors/conductor_details"><button class="view">View</button> </a>
                    </div>
                </div>

                <div class="card">
                    <div class="images">
                        <img src="<?php echo URLROOT; ?>/img/owner_img/con5.jpg" alt="">
                    </div>

                    <div class="caption">

                        <p class="product_name">Name - Nethmal</p>
                        <p class="price">NTC No - CB303</p>
                        <a href="<?php echo URLROOT; ?>/owner_conductors/conductor_details"><button class="view">View</button> </a>
                    </div>
                </div>

                <div class="card">
                    <div class="images">
                        <img src="<?php echo URLROOT; ?>/img/owner_img/con6.jpg" alt="">
                    </div>

                    <div class="caption">

                        <p class="product_name">Name - Methun</p>
                        <p class="price">NTC No - CB304</p>
                        <a href="<?php echo URLROOT; ?>/owner_conductors/conductor_details"><button class="view">View</button></a>
                    </div>
                </div>


        </div>

    </div>

</body>

</html>