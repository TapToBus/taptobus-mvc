<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/drregister-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>

    <?php require  APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">

        <!-- right side of the  page -->
        <div class="right">
            <div class="box">
                <h2>Driver Registration Form<Form></Form>
                </h2>

                <!-- register form -->
                <form action="<?php echo URLROOT; ?>/owner_drivers/register_driver" method="POST">

                    <div class="field1">
                        <div class="fname">
                            <label for="fname">First Name</label> <br>
                            <input type="text" name="fname" placeholder="Enter first name" value="<?php echo $data['fname']; ?>" maxlength="25"> <br>
                            <span><?php echo $data['fname_err']; ?></span>
                        </div>

                        <div class="lname">
                            <label for="lname">Last Name</label> <br>
                            <input type="text" name="lname" placeholder="Enter last name" value="<?php echo $data['lname']; ?>" maxlength="25"> <br>
                            <span><?php echo $data['lname_err']; ?></span>
                        </div>
                    </div>

                    <div class="field4">
                    <div class="nic">
                        <label for="nic">NIC</label> <br>
                        <input type="text" name="nic" placeholder="Enter NIC No" value="<?php echo $data['nic']; ?>" maxlength="12"> <br>
                        <span><?php echo $data['nic_err']; ?></span>
                    </div>

                    <div class="ntcNo">
                        <label for="ntcNo">NTC No</label> <br>
                        <input type="text" name="ntcNo" placeholder="Enter NTC No" value="<?php echo $data['ntcNo']; ?>" maxlength="12"> <br>
                        <span><?php echo $data['ntcNo_err']; ?></span>
                    </div>
                    </div>

                    <div class="field2">
                        <div class="email">
                            <label for="email">Email</label> <br>
                            <input type="email" name="email" placeholder="Enter email" value="<?php echo $data['email']; ?>" maxlength="255"> <br>
                            <span><?php echo $data['email_err']; ?></span>
                        </div>

                        <div class="mobileNo">
                            <label for="mobileNo">Mobile No</label> <br>
                            <input type="tel" name="mobileNo" placeholder="Enter mobile no" value="<?php echo $data['mobileNo']; ?>" maxlength="10"> <br>
                            <span><?php echo $data['mobileNo_err']; ?></span>
                        </div>
                    </div>

                    <div class="field3">
                        <div class="dob">
                            <label for="dob">Birth Date</label> <br>
                            <input type="date" name="dob" placeholder="Enter birth date" value="<?php echo $data['dob']; ?>" maxlength="20"> <br>
                            <span><?php echo $data['dob_err']; ?></span>
                        </div>

                        <div class="address">
                            <label for="address">Address</label> <br>
                            <input type="text" name="address" placeholder="Enter address" value="<?php echo $data['address']; ?>" maxlength="255"> <br>
                            <span><?php echo $data['address_err']; ?></span>
                        </div>
                    </div>

                    <div class="field5">
                        <div class="dr_image">
                            <label for="dr_image">Conductor Image</label> <br>
                            <input type="file" name="dr_image"  > <br>
                            
                        </div>

                    </div>

                   
                    <div class="btn">
                        <button><span></span>Register</button>
                    </div>
                    
                </form>

              
            </div>
        </div>

    </div>

</body>

</html>