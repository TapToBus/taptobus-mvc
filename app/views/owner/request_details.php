<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/owner-style/requestdetails-style.css">
    

</head>
<body>

    <?php require  APPROOT . '/views/inc/owner_navbar.php'?>

    <div class="container">
        <p>
            <div class="main_details">
                <div class="main_left">
                    <div class="profile_pic">
                        <img src="<?php echo URLROOT?>/img/owner_img/req.jpg" alt="" srcset="" id="photo">
                        <!-- <label for="file" id="uploadBtn"><i class="fa-solid fa-pen-to-square"></i></label>
                        <input type="file" id="file"> -->
                    </div>
                    
                    <?php
                
                       foreach ($data as $row):
               
                    ?>

                    <p class="usr_name">Leave Request from <?php echo $row->user_fname;?></p>
                        <hr>
                    <div class="info">
                        <label for=""><b>NTC No.  - </b> <?php echo $row->user_ntc;?></label>
                        <label for=""><b>From - </b> <?php echo $row->date_from;?> </label>
                        <label for=""><b>To   - </b> <?php echo $row->date_to;?></label>
                        <p for=""><b>Reason - </b> <?php echo $row->reason;?></p>
                        
                    </div>

                    <?php
                
                       endforeach;
        
                    ?>

                    <div class="row">

                           <!-- <input type="submit" value="Accept" href="<?php echo URLROOT; ?>/owner_conductors/update_assigned_bus?user_ntc=<?php echo $row->user_ntc; ?>?type=<?php echo $row->type; ?>" >
                           <input type="submit" value="Reject"> -->

                           <a href="<?php echo URLROOT; ?>/owner_leaverequests/update_assigned_bus?user_ntc=<?php echo $row->user_ntc; ?>&type=<?php echo $row->type; ?>&request_id=<?php echo $row->request_id; ?>"> <button>Accept</button></a>
                           <a> <button>Reject</button></a>
                    </div>
                </div>
                
            </div>
        </p>
        
    </div>

</body>
</html>