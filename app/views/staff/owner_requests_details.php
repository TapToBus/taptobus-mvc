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
</head>

<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>

    <div class="container">
            
            <h2>Owner001</h2>
            <div class="container-2">
                    <div class="details-top">
                        <div class="top-left">
                            <span>NIC </span>
                            <span>Name</span>
                            <span>E mail</span>
                            <span>Mobile No</span>
                            <span>Bus numbers</span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="top-right">
                            <img src="" alt="Owner Picture" srcset="">
                        </div>                       
                    </div>
                    <div class="details-bottom">
                        <div class="download-pic">
                            Bus permit <br><br>
                            <i class="fa-solid fa-download"></i>
                            <a href="#">Download here</a>
                        </div>
                        <div class="action-btn">
                            <button class="accept">Accept</button>
                            <button class="reject">Reject</button>
                        </div>
                    </div>
            </div>        
    </div>
</body>

</html>
     
