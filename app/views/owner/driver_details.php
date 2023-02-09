<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/owner-style/driverdetails-style.css">
    

</head>
<body>

    <?php require  APPROOT . '/views/inc/owner_navbar.php'?>

    <div class="container">
        <p>
            <div class="main_details">
                <div class="main_left">
                    <div class="profile_pic">
                        <img src="<?php echo URLROOT?>/img/owner_img/dr1.jpg" alt="" srcset="" id="photo">
                        <!-- <label for="file" id="uploadBtn"><i class="fa-solid fa-pen-to-square"></i></label>
                        <input type="file" id="file"> -->
                    </div>
                    <p class="usr_name">Sahan Chathuranga</p>
                        <hr>
                    <div class="info">
                        <label for=""><b>NTC No.  - </b> CD301</label>
                        <label for=""><b>NIC  - </b> 988170097V</label>
                        <label for=""><b>Address  - </b> Minduala,Digaradda,Ahangama</label>
                        <label for=""><b>Mobile No.  - </b> 0765485641</label>
                        <label for=""><b>Email  - </b> sahanh@gmail.com</label>
                    </div>
                    <div class="row">

                       <input type="submit" value="Remove">

                    </div>
                </div>
                
            </div>
        </p>
        
    </div>

</body>
</html>