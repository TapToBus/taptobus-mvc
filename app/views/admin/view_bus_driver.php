<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin-style/view.css">
    <script src="https://kit.fontawesome.com/74174153b4.js" crossorigin="anonymous"></script>
    <title><?php echo SITENAME; ?></title>
</head>

<body>

    <?php require APPROOT . '/views/inc/admin_navbar.php' ?>

    <div class="main">
        <div class="content-heading">
            <h1>Bus Drivers</h1>
            <hr>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NTC no</th>
                    <th>Owner NIC</th>
                    <th>License no</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>NIC</th>
                    <th>DOB</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Email</th>
                    <th>Rating</th>
                </tr>

                <?php foreach ($data['drivers'] as $drivers) : ?>
                    <tr>
                        <td><?php echo $drivers->ntcNo; ?></td>
                        <td><?php echo $drivers->owner_nic; ?></td>
                        <td><?php echo $drivers->licenseNo; ?></td>
                        <td><?php echo $drivers->fname; ?></td>
                        <td><?php echo $drivers->lname; ?></td>
                        <td><?php echo $drivers->nic; ?></td>
                        <td><?php echo $drivers->dob; ?></td>
                        <td><?php echo $drivers->mobileNo; ?></td>
                        <td><?php echo $drivers->telNo; ?></td>
                        <td><?php echo $drivers->email; ?></td>
                        <td><?php echo $drivers->ratings; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <!-- </div> -->


</body>

</html>