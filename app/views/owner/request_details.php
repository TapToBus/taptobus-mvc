<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

                           <form id="myform" action="<?php echo URLROOT; ?>/owner_leaverequests/update_assigned_bus" method="POST">
                             
                               <input type="hidden" name="request_id" value="<?php echo $row->request_id;?>">
                               <input type="hidden" name="user_ntc" value="<?php echo $row->user_ntc;?>">
                               <input type="hidden" name="type" value="<?php echo $row->type;?>">
                               <input type="hidden" name="owner_nic" value="<?php echo $_SESSION['user_id']; ?>">
                               <input type="hidden" name="heading" value="Assign a bus conductor">
                               <input type="hidden" name="description" value="There is no conductor is assigned for the <?php echo $row->bus_no;?> bus. Please assign a conductor for this bus.">

                           </form>

                           <a > <button id="accept-button" >Accept</button></a>
                           <a href="<?php echo URLROOT; ?>/owner_leaverequests/reject_leaverequest?request_id=<?php echo $row->request_id; ?>"> <button>Reject</button></a>

                           <script>
                             
                             $(document).ready(function(){

                                $("#accept-button").click(function(){

                                    $("#myform").submit();
                                });

                             });
                                
                           </script>
                    </div>
                </div>
                
            </div>
        </p>
        
    </div>

</body>
</html>