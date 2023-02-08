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
            <h1>Passengers</h1>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>NIC</th>
                    <th>DOB</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Email</th>   
                </tr>
                <tr>
                    <td>Umesha</td>
                    <td>Sandunika</td>
                    <td>988267542v</td>
                    <td>1998/12/2</td>
                    <td>0765654342</td>
                    <td>0412345432</td>
                    <td>sanduni123@gmail.com</td>               
                </tr> 
                <tr>
                    <td>Janith</td>
                    <td>Madarasingha</td>
                    <td>988334492v</td>
                    <td>1998/12/2</td>
                    <td>0775434542</td>
                    <td>0412345432</td>
                    <td>janith@gmail.com</td>               
                </tr> 
            </table>
        </div>
    </div>
</body>

</html>