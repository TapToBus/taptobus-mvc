<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/owner-style/conductordetails-style.css">
    

</head>
<body>

    <?php require  APPROOT . '/views/inc/owner_navbar.php'?>

    <div class="container">
        
        <?php
                
            foreach ($data as $row):

        ?>

        <p>
            <div class="main_details">
                <div class="main_left">
                    <div class="profile_pic">
                        <img src="<?php echo URLROOT?>/img/profile-pic/<?php echo $row->pic;?>" alt="" srcset="" id="photo">
                        <!-- <label for="file" id="uploadBtn"><i class="fa-solid fa-pen-to-square"></i></label>
                        <input type="file" id="file"> -->
                    </div>
                    <p class="user_name"><?php echo $row->fname; ?> <?php echo $row->lname; ?></p>
                        <hr>
                    <div class="info">
                        <label for=""><b>NTC No.  - </b> <?php echo $row->ntcNo; ?></label>
                        <label for=""><b>NIC  - </b> <?php echo $row->nic; ?></label>
                        <label for=""><b>Address  - </b> <?php echo $row->dob; ?></label>
                        <label for=""><b>Mobile No.  - </b> <?php echo $row->mobileNo; ?></label>
                        <label for=""><b>Email  - </b> <?php echo $row->email; ?></label>
                    </div>
                    <div class="row">

                           <input type="submit" value="Remove">

                    </div>
                </div>
                
            </div>
        </p>

        <?php
                
            endforeach;

        ?>   
        
    </div>

</body>
</html>