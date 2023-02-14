<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/pdetails-style.css" />

</head>

<body>

    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>    

    <div class="container">
        <div class="content-heading">
            <h1>Conductors</h1>
        </div>

        <div class="content-table">
            <table class="full-table">
            <tr>
                    <th>Driver ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>NIC</th>
                    <th>Mobile no</th>
                    <th>Email</th>   
                </tr>
                <tr>
                              
                </tr> 
              
            </table>
        </div>
    </div>
</body>

</html>