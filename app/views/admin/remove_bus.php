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
            <h1>Buses</h1>
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

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>Bus No</th>
                    <th>Root No</th>
                    <th>Capacity</th>
                    <th>Conductor NTC No</th>
                    <th>Driver NTC No</th>
                    <th>Owner NIC</th>
                    <th>Rating</th>
                    <th>Total Ratings</th>
                    <th>Responses</th>

                    <!-- <th>Root permit no</th>
                    <th>License no</th> -->

                    <th class="delete-button"></th>
                </tr>
                <?php foreach ($data['removebuses'] as $removebuses) : ?>
                    <tr>
                        <td><?php echo $removebuses->bus_no ?></td>
                        <td><?php echo $removebuses->root_no ?></td>
                        <td><?php echo $removebuses->capacity ?></td>
                        <td><?php echo $removebuses->con_ntc ?></td>
                        <td><?php echo $removebuses->dri_ntc ?></td>
                        <td><?php echo $removebuses->owner_nic ?></td>
                        <td><?php echo $removebuses->ratings ?></td>
                        <td><?php echo $removebuses->total_ratings ?></td>
                        <td><?php echo $removebuses->responses ?></td>
                        <td>
                            <div class="delete-button">
                                <button type="button" class="delete-btn" onclick="openModal('<?php echo $removebuses->bus_no ?>')">Reset</button>
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
            <p>Do you really wants to re activate this bus .</p>

            <form action="<?php echo URLROOT ?>/Admin_remove_user_dashboard/remove_bus" method="POST" class="delete-button">
                    <button class="delete-btn" type="submit" name="removeBusBtn" id="removeBusBtn">Yes</button>
                    <button class="delete-btn" type="button" onclick="closeModal()">No</button>
            </form>
        </div>
    </dialog>

    <script src="<?php echo URLROOT; ?> /js/admin-js/reset-bus-popup.js"></script>




</body>

</html>