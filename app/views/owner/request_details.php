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
                    <p class="usr_name">Leave Request from Sahan</p>
                        <hr>
                    <div class="info">
                        <label for=""><b>NTC No.  - </b> CB321</label>
                        <label for=""><b>Reason - </b> For attend a funeral</label>
                        <label for=""><b>From - </b> 2023-02-09 </label>
                        <label for=""><b>To   - </b> 2023-02-11</label>

                    </div>

                    <div class="row">

                           <input type="submit" value="Accept">
                           <input type="submit" value="Reject">

                    </div>
                </div>
                
            </div>
        </p>
        
    </div>

</body>
</html>