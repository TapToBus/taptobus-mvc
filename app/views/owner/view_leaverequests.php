<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/viewleaverequests-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">

        <div>

            <h2 class="header">Leave Requests</h2>
        </div>

        <div class="new">
          
          <?php
                
                foreach ($data as $row):
               
          ?>
            <div class="card">
                <div class="images">
                    <img src="<?php echo URLROOT; ?>/img/owner_img/request.png" alt="">
                </div>

                <div class="caption">

                    <p class="product_name">Name - <?php echo $row->user_fname; ?> <?php echo $row->user_lname; ?></p>
                    <p class="price">Type - <?php echo $row->type; ?></p>
                    
                </div>

                <div class="btn-div">
                    <!-- <?php $_SESSION['user_ntc'] =  $row->user_ntc; ?> -->
                    <a href="<?php echo URLROOT; ?>/owner_leaverequests/request_details?request_id=<?php echo $row->request_id; ?>"><button class="view">View</button></a>
                </div>
            </div>

          <?php
            endforeach;
          ?> 

        </div>

    </div>


    <!-- <div class="container2">

            <table>

                <thead>
                    <tr>
                        <th>Bus No</th>
                        <th>Name</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($data1 as $row) :

                    ?>

                        <tr>
                            <td><?php echo $row->bus_no; ?></td>
                            <td><?php echo $row->user_fname; ?></td>
                            <td><?php echo $row->date_from; ?></td>
                            <td><?php echo $row->date_to; ?></td>
                            <td><?php echo $row->status; ?></td>
                        </tr>

                    <?php

                    endforeach;

                    ?>

                </tbody>

            </table>

        </div> -->


</body>

</html>