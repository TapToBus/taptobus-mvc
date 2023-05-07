<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/driverrequestdetails-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/confirmpopup-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/rejectpopup-style.css" />
</head>

<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>

    
    <div class="container">
            <?php $result = $data['driverRequestDetails']?>

            <h2>Driver: <?php echo ' '. $result->fname.' '.$result->lname?></h2>
            <div class="container-2">
                    <div class="details-top">
                        <div class="top-left">
                            <div class="top-label">
                                <span>NTC No</span>
                                <span>NIC </span>
                                <span>Name</span>
                                <span>E mail</span>
                                <span>Mobile No</span>
                            </div>
                            <div class="top-data">
                                <span><?php echo ':'.$result->ntcNo?></span>
                                <span> <?php echo ': '.$result->nic?></span>
                                <span><?php echo ': '.$result->fname.' '.$result->lname?></span>
                                <span><?php echo ': '.$result->email?></span>
                                <span><?php echo ': '.$result->mobileNo?></span>
                            </div>
                        </div>
                        <div class="top-right">
                            <img src="" alt="driver pic" srcset="">
                        </div>                       
                    </div>
                    <div class="details-bottom">
                        <div class="action-btn">
                            <button id ="accept" class="accept" onclick="showConfirmation()">Accept</button>
                            <button id = "reject"  class="reject" onclick="showRejection()">Reject</button>
                        </div>
                    </div>
            </div>   
             <!-- confirmation pop-up Moodel   -->
             <dialog id="confirmation-dialog" class="confirmation-box">
                <div class = "confirm-msg">
                    <p>Are you sure that you want to add <?php echo $result->fname.' '.$result->lname?> to the system?</p>                    
                </div>
                <div class="confirm-btns">
                    <a href="<?php echo URLROOT?>/Staff_view_requests/accept_driver_requests?driver_ntc=<?php echo $result->ntcNo?>&owner_nic=<?php echo $result->owner_nic?>">
                        <button class = "yes" onclick="">Yes</button>
                    </a>
                    <button class = "no" onclick="hideConfirmation()">No</button>
                </div>
            </dialog>

            <!-- Rejection pop-up Moodel   -->
            <dialog id="rejection-dialog" class="rejection-box">
                <form action="<?php echo URLROOT?>/Staff_view_requests/reject_driver_requests?driver_ntc=<?php echo $result->ntcNo?>&owner_nic=<?php echo $result->owner_nic?>" method="POST" onsubmit="return validateForm()">
                    <div class = "reject-msg">
                        <p>Please enter the reason for the rejection</p>  
                        <textarea id="reject-reason" type="text" placeholder="Type the reason here" name="reject_reason"></textarea>               
                    </div>
                    <div class="rejection-btns">
                        <!-- <a href="<?php //echo URLROOT?>/Staff_view_requests/reject_bus_requests?bus_no=<?php //echo $result->bus_no?>"> -->
                        <button type="submit" class = "send" name="send" onclick="">Send</button>
                        <!-- </a> -->
                        <button class = "cancel" name="cancel" onclick="hideRejection()">cancel</button>
                    </div>
                </form>
            </dialog>       
    </div>
    <script  src="<?php echo URLROOT;?>/js/staff/popup-msg.js" ></script>
</body>

</html>
     
