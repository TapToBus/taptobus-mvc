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
            <h1>HISTORY</h1>
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

        <div class="history_admin_charts">
            <div class="history_admin_chart">
                <h2> Remove Passenger History (Monthly) </h2>
                <canvas id="admin-remove-passenger-chart"></canvas>
            </div>
            <div class="history_admin_chart">
                <h2> Remove Bus History (Monthly) </h2>
                <canvas id="admin-remove-bus-chart"></canvas>
            </div>
        </div>

        <div class="content-heading">
            <h1>Passengers</h1>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NIC</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                </tr>

                <?php foreach ($data1['removepassengers'] as $removepassengers) : ?>
                    <tr>
                        <td><?php echo $removepassengers->nic; ?></td>
                        <td><?php echo $removepassengers->fname; ?></td>
                        <td><?php echo $removepassengers->lname; ?></td>
                        <td><?php echo $removepassengers->email; ?></td>
                        <td><?php echo $removepassengers->mobileNo; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="content-heading">
            <h1>Bus Owners</h1>
        </div>


        <div class="content-heading">
            <h1>Buses</h1>
        </div>

        <div class="content-heading">
            <h1>Bus Conductors</h1>
        </div>

        <div class="content-heading">
            <h1>Bus Drivers</h1>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/admin-remove-passenger-chart.js"> </script>
    <script src="../js/admin-remove-bus-chart.js"> </script>




</body>

</html>