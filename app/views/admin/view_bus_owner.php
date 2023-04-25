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
            <h1>BUS OWNERS</h1>
        </div>

        <div class="searching-and-sorting">
            <div class="searching">
                <input type="text" id="search" placeholder="Search here">
                <label for="search"><i class="fas fa-search"></i></label>

            </div>
            <div class="sorting">
                for sorting bar
            </div>
        </div>

        <!-- <div class="new-add-user-bar-chart">
            <h2> Weekly profit </h2>
            <canvas id="admin-owner-bar-chart"></canvas>
        </div> -->

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NIC</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                    <th class="delete-button"></th>
                </tr>

                <?php foreach ($data['owners'] as $owners) : ?>
                    <tr>
                        <td><?php echo $owners->nic; ?></td>
                        <td><?php echo $owners->fname; ?></td>
                        <td><?php echo $owners->lname; ?></td>
                        <td><?php echo $owners->email; ?></td>
                        <td><?php echo $owners->mobileNo; ?></td>
                        <td>
                            <div class="delete-button">
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $owners->nic ?>')">Delete</button>
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
            <p>Do you really wants to delete this bus owner.</p>

            <form action="<?php echo URLROOT?>/Admin_view_user_dashboard/delete_bus_owner" method="POST" class="delete-button">
                    <button class="delete-btn" type="submit" id="deleteBusOwnerBtn" name="deleteBusOwnerBtn">Yes</button>
                    <button class="delete-btn" type="button" onclick="closeModal()">No</button>
            </form>
        </div>
    </dialog>

    <script src="<?php echo URLROOT; ?> /js/admin-js/delete-owner-popup.js"></script>

    
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/owner-monthly-chart.js"></script> -->


</body>

</html>