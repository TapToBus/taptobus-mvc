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
            <h1>PASSENGERS</h1>
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
            <canvas id="admin-passenger-bar-chart"></canvas>
        </div> -->

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NIC</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                </tr>

                <?php foreach ($data['passengers'] as $passengers) : ?>
                    <tr>
                        <td><?php echo $passengers->nic; ?></td>
                        <td><?php echo $passengers->fname; ?></td>
                        <td><?php echo $passengers->lname; ?></td>
                        <td><?php echo $passengers->email; ?></td>
                        <td><?php echo $passengers->mobile_no; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/passenger-monthly-chart.js"></script> -->


</body>

</html>