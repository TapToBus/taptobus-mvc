<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffdashboard-style.css" />

</head>
<body>    
    <?php 
        $active = "dashboard";
        require APPROOT . '/views/inc/staff_navbar.php' 
    ?>

        <div class="container">
            <h2>Dashboard</h2>
            <!-- <div class="search">
                    <input type="text" name="search" placeholder="search here">
                    <label for="search"><i class="fas fa-search"></i></label>
            </div>             -->
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">21</div>
                        <div class="card-name">Owners</div>
                    </div>
                    <div class="icon-box">
                         <i class="fa-solid fa-person"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">42</div>
                        <div class="card-name">Conductors</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">68</div>
                        <div class="card-name">drivers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">45</div>
                        <div class="card-name">Buses</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-bus"></i>
                    </div>
                </div>
            </div>
            <div class="charts">
                <div class="chart">
                    <h2>User population ( past 12 months )</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="chart doughnut-chart">
                    <h2>Employees</h2>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="<?php echo URLROOT;?>/js/staff/chart1.js"></script>
    <script src="<?php echo URLROOT;?>/js/staff/chart2.js"></script>
   
</body>
</html>

