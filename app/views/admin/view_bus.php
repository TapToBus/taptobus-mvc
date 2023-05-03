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
            <h1>BUSES</h1>

        </div>

        <div class="searching-and-sorting">
            <div class="searching">

                <form class="searchForm" action="<?php echo URLROOT; ?>/Admin_view_user_dashboard/adminSearchBuses" method="GET">
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
                    <th>Bus No</th>
                    <th>Root No</th>
                    <th>Capacity</th>
                    <th>Conductor NTC No</th>
                    <th>Driver NTC No</th>
                    <th>Owner NIC</th>
                    <th>Rating</th>
                    <th>Total Ratings</th>
                    <th>Responses</th>
                </tr>

                <?php foreach ($data['buses'] as $buses) : ?>
                    <tr>
                        <td><?php echo $buses->root_no ?></td>
                        <td><?php echo $buses->bus_no ?></td>
                        <td><?php echo $buses->capacity ?></td>
                        <td><?php echo $buses->con_ntc ?></td>
                        <td><?php echo $buses->dri_ntc ?></td>
                        <td><?php echo $buses->owner_nic ?></td>
                        <td><?php echo $buses->ratings ?></td>
                        <td><?php echo $buses->total_ratings ?></td>
                        <td><?php echo $buses->responses ?></td>
                        <td>
                            <div class="delete-button">
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $buses->bus_no ?>')">Delete</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    <!-- </div> -->


</body>

</html>