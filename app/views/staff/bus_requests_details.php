<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/busrequestdetails-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/confirmpopup-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/rejectpopup-style.css" />
</head>

<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>

    <div class="container">
            <?php $result = $data['busRequestDetails']?>

            <h2><?php echo $result->bus_no?></h2>
            <div class="container-2">
                    <div class="details-top">
                        <div class="top-left">
                            <div class="top-label">
                                <span>Bus owner NIC  </span>
                                <span>Bus number  </span>
                                <span>Root number  </span>
                                <span>Capacity  </span>
                            </div>
                            <div class="top-data">
                                <span><?php echo ': '.$result->owner_nic?></span>
                                <span><?php echo ': '. $result->bus_no?></span>
                                <span><?php echo ': '.$result->root_no?></span>
                                <span><?php echo ': '.$result->capacity?></span>
                            </div>
                        </div>
                        <div class="top-right">
                            <img src="" alt="Bus image" srcset="">
                        </div>                       
                    </div>
                    <div class="details-bottom">
                        <div class="download-pic">
                            Bus permit <br><br>
                            <i class="fa-solid fa-download"></i>
                            <a href="#">Download here</a>
                        </div>
                        <div class="action-btn">
                            <button id ="accept"class="accept" onclick="showConfirmation()">Accept</button>
                            <button id = "reject" class="reject" onclick="showRejection()">Reject</button>
                        </div>
                    </div>
            </div>      

            <!-- confirmation pop-up Moodel   -->
            <dialog id="confirmation-dialog" class="confirmation-box">
                <div class = "confirm-msg">
                    <p>Are you sure that you want to add <?php echo $result->bus_no?> to the system?</p>                    
                </div>
                <div class="confirm-btns">
                    <button class = "yes" onclick="">Yes</button>
                    <button class = "no" onclick="hideConfirmation()">No</button>
                </div>
            </dialog>

            <!-- Rejection pop-up Moodel   -->
            <dialog id="rejection-dialog" class="rejection-box">
                <form action="" method="post">
                    <div class = "reject-msg">
                        <p> Please enter the reason for the rejection</p>  
                        <textarea type="text" placeholder="Type the reason here" name="reason"></textarea>               
                    </div>
                    <div class="rejection-btns">
                        <button class = "send" onclick="">Send</button>
                        <button class = "cancel" onclick="hideConfirmation()">cancel</button>
                    </div>
                </form>
            </dialog>
           
    </div>
    <script  src="<?php echo URLROOT;?>/js/staff/popup-msg.js" ></script>
</body>

</html>
     