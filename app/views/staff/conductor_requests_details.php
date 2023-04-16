<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/conductorrequestdetails-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
</head>

<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>

    <div class="container">
    <?php  $result = $data['conductorRequestDetails'] ?>
            
            <h2><?php echo $result->fname.' '.$result->lname?></h2>
            <div class="container-2">
                    <div class="details-top">
                        <div class="top-left">
                            <div class="top-label">
                                <span>NIC </span>
                                <span>Name</span>
                                <span>E mail</span>
                                <span>Mobile No</span>
                            </div>
                            <div class="top-data">
                                <span> <?php echo ': '.$result->nic?></span>
                                <span><?php echo ': '.$result->fname.' '.$result->lname?></span>
                                <span><?php echo ': '.$result->email?></span>
                                <span><?php echo ': '.$result->mobileNo?></span>
                            </div>
                        </div>
                        <div class="top-right">
                            <img src="" alt="conductor pic" srcset="">
                        </div>                       
                    </div>
                    <div class="details-bottom">
                        <div class="action-btn">
                            <button class="accept">Accept</button>
                            <button class="reject">Reject</button>
                        </div>
                    </div>
            </div>        
    </div>
</body>

</html>
     
