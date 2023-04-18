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
            <h1>Bus Conductors</h1>
            
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NTC no</th>
                    <th>NIC</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Rating</th>
                    <th>Total Ratings</th>
                    <th>Responses</th>
                    <th>Owner NIC</th>
                    <th class="delete-button"></th>
                </tr>

                <?php foreach($data['removeconductors'] as $removeconductors) : ?>
                    <tr>
                        <td><?php echo $removeconductors->ntcNo; ?></td>
                        <td><?php echo $removeconductors->nic; ?></td>
                        <td><?php echo $removeconductors->fname; ?></td>
                        <td><?php echo $removeconductors->lname; ?></td>
                        <td><?php echo $removeconductors->dob; ?></td>
                        <td><?php echo $removeconductors->address; ?></td>
                        <td><?php echo $removeconductors->email; ?></td>
                        <td><?php echo $removeconductors->mobileNo; ?></td>
                        <td><?php echo $removeconductors->telNo; ?></td>
                        <td><?php echo $removeconductors->ratings; ?></td>
                        <td><?php echo $removeconductors->total_ratings; ?></td>
                        <td><?php echo $removeconductors->responses; ?></td>
                        <td><?php echo $removeconductors->owner_nic; ?></td>
                        <td>
                            <div class="delete-button">
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $removeconductors->ntcNo ?>')">Reset</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>

    </div>

    



</body>

</html>