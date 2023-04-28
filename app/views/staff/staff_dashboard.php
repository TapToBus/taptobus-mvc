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
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>
    
          <div class="container">
            <h2>Dashboard</h2>
            <!-- <div class="search">
                    <input type="text" name="search" placeholder="search here">
                    <label for="search"><i class="fas fa-search"></i></label>
            </div>             -->
            <div class="cards">
                <div class="card" id="card1">
                    <div class="card-content">
                        <div class="number"><?php echo (string)($data['no_of_owners'])?></div>
                        <div class="card-name">Owners</div>
                    </div>
                    <div class="icon-box">
                         <i class="fa-solid fa-person"></i>
                    </div>
                </div>
                <div class="card" id="card2">
                    <div class="card-content">
                        <div class="number"><?php echo (string)($data['no_of_conductors'])?></div>
                        <div class="card-name">Conductors</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="card" id="card3">
                    <div class="card-content">
                        <div class="number"><?php echo (string)($data['no_of_drivers'])?></div>
                        <div class="card-name">drivers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
                <div class="card" id="card4">
                    <div class="card-content">
                        <div class="number"><?php echo (string)($data['no_of_buses'])?></div>
                        <div class="card-name">Buses</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-bus"></i>
                    </div>
                </div>
            </div>


            <div class="charts">
                <!-- line chart -->
                <div class="chart">
                    <h2>User population (Monthly)</h2>
                    <div>
                        <canvas id="line-chart"></canvas>
                    </div>
                    <script>
                        fetch('<?php echo URLROOT ?>/Staff_dashboard/user_population_line_chart')
                            .then(response=>response.json())
                            .then(result=>{
                                const months  = result.map(item=>item.month)
                                const count  = result.map(item=>item.count)

                                const lineChart = new Chart(document.getElementById('line-chart'),{
                                type: 'line',
                                data: {
                                    labels:months,
                                    datasets:[{
                                        label:'User count over month',
                                        data:counts,
                                        borderColor: 'rgb(75, 192, 192)',
                                        tension: 0.1
                                    }]
                                }
                                });
                                
                            })
                            .catch(error=>console.log(error))
                    </script>
                </div>

                <!-- doughnut chart -->
                <div class="chart doughnut-chart">
                    <h2>Users</h2>
                    <div>
                        <canvas id="doughnut-chart"></canvas>
                    </div>
                    <script>
                        fetch('<?php echo URLROOT ?>/Staff_dashboard/current_user_doughnut_chart')
                            .then(response=>response.json())
                            .then(result=>{
                            
                            const types = result.map(item=>item.type)
                            const counts = result.map(item=>item.count)

                            const pieChart = new Chart(document.getElementById('doughnut-chart'),{
                                type: 'doughnut',
                                data: {
                                    labels:types,
                                    datasets:[{
                                        data:counts
                                    }]
                                }
                            });
                        })
                        .catch(error=>console.log(error))
                    </script>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </body>
</html>

