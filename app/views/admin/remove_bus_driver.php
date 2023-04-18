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
                    <th>NIC</th>
                    <!-- <th>License no</th> -->
                    <th>First name</th>
                    <th>Last name</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Ratings</th>
                    <th>Total Ratings</th>
                    <th>Responses</th>
                    <th>Owner_nic</th>
                    <th class="delete-button"></th>
                </tr>
                <?php foreach($data['removedrivers'] as $removedrivers) : ?>
                <tr>
                    <td><?php echo $removedrivers->ntcNo; ?></td>
                    <td><?php echo $removedrivers->nic; ?></td>
                    <td><?php echo $removedrivers->fname; ?></td>
                    <td><?php echo $removedrivers->lname; ?></td>
                    <td><?php echo $removedrivers->dob; ?></td>
                    <td><?php echo $removedrivers->address; ?></td>
                    <td><?php echo $removedrivers->email; ?></td>
                    <td><?php echo $removedrivers->mobileNo; ?></td>
                    <td><?php echo $removedrivers->telNo; ?></td>
                    <td><?php echo $removedrivers->ratings; ?></td>
                    <td><?php echo $removedrivers->total_ratings; ?></td>
                    <td><?php echo $removedrivers->responses; ?></td>
                    <td><?php echo $removedrivers->owner_nic; ?></td>
                    <td>
                        <div class="delete-button">
                            <button type="button" class="delete-btn" onclick="openModal('<?php echo $removedrivers->ntcNo ?>')">Reset</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>



</body>

</html>