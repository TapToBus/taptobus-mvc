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
            <h1>BUS DRIVERS</h1>
        </div>

        <div class="searching-and-sorting">
            <div class="searching">

                <form class="searchForm" action="<?php echo URLROOT; ?>/Admin_view_user_dashboard/adminSearchBusDrivers" method="GET">
                    <input type="text" id="search" name="search" placeholder="Search Here...">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

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
                    <th>Rating</th>
                    <th>Owner NIC</th>
                    <th>Bus number</th>
                    <th class="delete-button"></th>

                </tr>

                <?php foreach ($data['drivers'] as $drivers) : ?>
                    <tr>
                        <td><?php echo $drivers->ntcNo; ?></td>
                        <td><?php echo $drivers->nic; ?></td>
                        <td><?php echo $drivers->fname; ?></td>
                        <td><?php echo $drivers->lname; ?></td>
                        <td><?php echo $drivers->dob; ?></td>
                        <td><?php echo $drivers->email; ?></td>
                        <td><?php echo $drivers->mobileNo; ?></td>
                        <td><?php echo $drivers->telNo; ?></td>
                        <td><?php echo $drivers->ratings; ?></td>
                        <td><?php echo $drivers->owner_nic; ?></td>
                        <td><?php echo $drivers->bus_no; ?></td>
                        <td>
                            <div class="delete-button">
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $drivers->ntcNo ?>')">Delete</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    <dialog id="DeletePopup" class="resetPopup">
        <div class="resetPopup-contianer">
            <h1>Are You Sure ?</h1>
            <p>Do you really wants to delete this bus driver.</p>

            <form action="<?php echo URLROOT ?>/Admin_view_user_dashboard/delete_bus_driver" method="POST" class="delete-button">
                <button class="delete-btn" type="submit" id="deleteBusDriverBtn" name="deleteBusDriverBtn">Yes</button>
                <button class="delete-btn" type="button" onclick="closeModal()">No</button>
            </form>
        </div>
    </dialog>

    <script src="<?php echo URLROOT; ?> /js/admin-js/delete-driver-popup.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/driver-monthly-chart.js"></script> -->


</body>

</html>