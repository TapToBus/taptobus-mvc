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

    <?php 
        $active = "Users";
        require APPROOT . '/views/inc/admin_navbar.php' 
    ?>

    <div class="main">
        <div class="content-heading">
            <h1>BUS CONDUCTOR</h1>
        </div>

        <div class="searching-and-sorting">
            <div class="searching">

                <form class="searchForm" action="<?php echo URLROOT; ?>/Admin_view_user_dashboard/adminSearchBusConductors" method="GET">
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
                    <!-- <th>DOB</th> -->
                    <th>Email</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Rating</th>
                    <th>Owner NIC</th>
                    <th>Bus number</th>
                    <th class="delete-button"></th>
                </tr>

                <?php foreach ($data['conductors'] as $conductors) : ?>
                    <tr>
                        <td><?php echo $conductors->ntcNo; ?></td>
                        <td><?php echo $conductors->nic; ?></td>
                        <td><?php echo $conductors->fname; ?></td>
                        <td><?php echo $conductors->lname; ?></td>
                        <td><?php echo $conductors->email; ?></td>
                        <td><?php echo $conductors->mobileNo; ?></td>
                        <td><?php echo $conductors->telNo; ?></td>
                        <td><?php echo $conductors->ratings; ?></td>
                        <td><?php echo $conductors->owner_nic; ?></td>
                        <td><?php echo $conductors->bus_no; ?></td>
                        <td>
                            <div class="delete-button">
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $conductors->ntcNo ?>')">Delete</button>
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
            <p>Do you really wants to delete this bus conductor.</p>

            <form action="<?php echo URLROOT ?>/Admin_view_user_dashboard/delete_bus_conductor" method="POST" class="delete-button">
                <button class="delete-btn" type="submit" id="deleteBusConductorBtn" name="deleteBusConductorBtn">Yes</button>
                <button class="delete-btn" type="button" onclick="closeModal()">No</button>
            </form>
        </div>
    </dialog>

    <script src="<?php echo URLROOT; ?> /js/admin-js/delete-conductor-popup.js"></script>


</body>

</html>