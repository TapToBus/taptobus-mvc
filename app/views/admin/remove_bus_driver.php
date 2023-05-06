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
        </div>

        <div class="searching-and-sorting">
            <div class="searching">
                <input type="text" id="search" placeholder="Search here">
                <label for="search"><i class="fas fa-search"></i></label>

            </div>
            <div class="sorting">

            </div>
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
                    <th>Email</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Ratings</th>
                    <th>Owner_nic</th>
                    <th class="delete-button"></th>
                </tr>

                <?php foreach ($data['removedrivers'] as $removedrivers) : ?>
                    <tr>
                        <td><?php echo $removedrivers->ntcNo; ?></td>
                        <td><?php echo $removedrivers->nic; ?></td>
                        <td><?php echo $removedrivers->fname; ?></td>
                        <td><?php echo $removedrivers->lname; ?></td>
                        <td><?php echo $removedrivers->dob; ?></td>
                        <td><?php echo $removedrivers->email; ?></td>
                        <td><?php echo $removedrivers->mobileNo; ?></td>
                        <td><?php echo $removedrivers->telNo; ?></td>
                        <td><?php echo $removedrivers->ratings; ?></td>
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

    <dialog id="resetPopup" class="resetPopup">
        <div class="resetPopup-contianer">
            <h1>Are You Sure ?</h1>
            <p>Do you really wants to re activate this bus driver.</p>

            <form action="<?php echo URLROOT ?>/Admin_remove_user_dashboard/remove_bus_driver" method="POST" class="delete-button">
                    <button class="delete-btn" type="submit" name="removeBusDriverBtn" id="removeBusDriverBtn">Yes</button>
                    <button class="delete-btn" type="button" onclick="closeModal()">No</button>
            </form>
        </div>
    </dialog>

    <script src="<?php echo URLROOT; ?> /js/admin-js/reset-driver-popup.js"></script>




</body>

</html>