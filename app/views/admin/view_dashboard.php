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
            <h1>DASHBOARD</h1>
        </div>

        <div class="admin-cards">
            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number">600</div>
                    <div class="admin-card-name">Users</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-users" id="2"></i>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number">400</div>
                    <div class="admin-card-name">Passengers</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-person"></i>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number">60</div>
                    <div class="admin-card-name">Bus Owners</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number">50</div>
                    <div class="admin-card-name">Buses</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-bus"></i>
                </div>
            </div>
        </div>


        <div class="admin-chart-heading">
            <div class="admin-chart">
                <h2> USER OVERVIEW </h2>
            </div>
        </div>

        <div class="admin-charts-pair">
            <div class="admin-chart-pair">
                <h2> New Users (Monthly) </h2>
                <!-- <canvas id="admin-bus-line-chart"></canvas> -->
                <canvas id="monthly-users-line-chart"></canvas>
            </div>

            <div class="admin-chart-pair">
                <h2 class="admin-chart-doughnut-heading"> Users </h2>
                <!-- <canvas id="admin-owner-bar-chart"></canvas> -->
                <canvas id="admin-doughnut"></canvas>
            </div>
        </div>

        <div class="admin-chart-box">
            <div class="admin-chart">
                <h2> New Passengers (Monthly) </h2>
                <canvas id="monthly-passenger-line-chart"></canvas>
            </div>
        </div>

        <div class="admin-charts">
            <div class="admin-chart">
                <h2> New Buses (Monthly) </h2>
                <canvas id="admin-bus-bar-chart"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo URLROOT; ?>/js/monthly-users-chart.js"></script>
    <script src="<?php echo URLROOT; ?>/js/admin-dashboard-doughnut-chart.js"></script>
    <script src="<?php echo URLROOT; ?>/js/bus-monthly-chart.js"></script>
    <script src="<?php echo URLROOT; ?>/js/passenger-monthly-chart.js"></script>



</body>

</html>