<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/viewbuses-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">

        <div>
            <a href="<?php echo URLROOT; ?>/owner_buses/add_bus"><button class="addbtn">Add Bus</button></a>
        </div>
       
         <div>

         <h2>Buses</h2>
         </div>

        <div class="new">

            <?php
                
                 foreach ($data as $row):

            ?>


                <div class="card">
                    <div class="images">
                        <img src="<?php echo URLROOT; ?>/img/bus/<?php echo $row->bus_image; ?>" alt="">
                    </div>

                    <div class="caption">

                        <p class="product_name">Bus No - <?php echo $row->bus_no; ?></p>
                        <p class="price">Root No - <?php echo $row->root_no; ?></p>
                        <!-- <p class="discount">Owner Name - <?php echo $row->owner_name; ?></p> -->
                        <p class="discount">Capacity - <?php echo $row->capacity; ?>
                        <a href="<?php echo URLROOT; ?>/owner_buses/bus_details?bus_no=<?php echo $row->bus_no; ?>"> <button class="view" >View</button> </a>
                    </div>
                </div>


            <?php
                endforeach; 
            ?>

        </div>

    </div>

</body>

</html>