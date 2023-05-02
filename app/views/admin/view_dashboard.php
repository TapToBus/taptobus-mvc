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
                    <div class="admin-number"><?php echo $data['user_count'] ?></div>
                    <div class="admin-card-name">Users</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-users" id="2"></i>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number"><?php echo $data['passenger_count'] ?></div>
                    <div class="admin-card-name">Passengers</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-person"></i>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number"><?php echo $data['owner_count'] ?></div>
                    <div class="admin-card-name">Bus Owners</div>
                </div>
                <div class="admin-icon-box">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-content">
                    <div class="admin-number"><?php echo $data['bus_count'] ?></div>
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
                <h2> Users (Monthly) </h2>
                <canvas id="monthly-users-line-chart"></canvas>

                <script>
                    fetch('<?php echo URLROOT ?>/Admin_api_controller/adminNewUserLineChart')
                        .then(response=>response.json())
                        .then(result=>{
                            const months = result.map(item=>item.month)
                            const counts = result.map(item=>item.count)

                            const lineChart = new Chart(document.getElementById('monthly-users-line-chart'),{
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



            <div class="admin-chart-pair">
                <h2 class="admin-chart-doughnut-heading"> Users </h2>

                <canvas id="admin-doughnut"></canvas>
                
                <script>
                    fetch('<?php echo URLROOT ?>/Admin_api_controller/adminDoughnutChart')
                        .then(response=>response.json())
                        .then(result=>{
                            
                            const types = result.map(item=>item.type)
                            const counts = result.map(item=>item.count)

                            const pieChart = new Chart(document.getElementById('admin-doughnut'),{
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

        <!-- admin-chart-box -->
        <div class="second-line-charts"> 
        <!-- admin-chart -->
            <div class="second-line-sub-chart">
                <h2> Passengers (Monthly) </h2>
                <canvas id="monthly-passenger-line-chart"></canvas>

                <script>
                    fetch('<?php echo URLROOT ?>/Admin_api_controller/adminNewPassengerLineChart')
                        .then(response=>response.json())
                        .then(result=>{
                            const months = result.map(item=>item.month)
                            const counts = result.map(item=>item.count)

                            const lineChart = new Chart(document.getElementById('monthly-passenger-line-chart'),{
                                type: 'line',
                                data: {
                                    labels:months,
                                    datasets:[{
                                        label:'passenger count over month',
                                        data:counts,
                                        borderColor: 'rgb(255, 102, 178)',
                                        tension: 0.1
                                    }]
                                }
                            });

                        })

                        .catch(error=>console.log(error))
                </script>
            </div>


            <div class="second-line-sub-chart">
                <h2> Buses (Monthly) </h2>
                <canvas id="admin-bus-bar-chart"></canvas>

                <script>
                    fetch('<?php echo URLROOT ?>/Admin_api_controller/adminNewBusLineChart')
                        .then(response=>response.json())
                        .then(result=>{
                            const months = result.map(item=>item.month)
                            const counts = result.map(item=>item.count)

                            const lineChart = new Chart(document.getElementById('admin-bus-bar-chart'),{
                                type: 'bar',
                                data: {
                                    labels:months,
                                    datasets:[{
                                        label:'bus count over month',
                                        data:counts,
                                        backgroundColor:['rgba(255, 99, 132, 0.2)',
                                                         'rgba(255, 159, 64, 0.2)',
                                                         'rgba(54, 162, 235, 0.2)',
                                                         'rgba(75, 192, 192, 0.2)',
                                                         'rgba(201, 203, 207, 0.2)',
                                                         'rgba(153, 102, 255, 0.2)',
                                                         'rgba(255, 99, 132, 0.2)',
                                                         'rgba(255, 159, 64, 0.2)',
                                                         'rgba(54, 162, 235, 0.2)',
                                                         'rgba(75, 192, 192, 0.2)',
                                                         'rgba(201, 203, 207, 0.2)',
                                                         'rgba(153, 102, 255, 0.2)'],
                                        borderColor: 'rgb(255, 102, 178)',
                                        tension: 0.1
                                    }]
                                }
                            });

                        })

                        .catch(error=>console.log(error))
                </script>

            </div>

        </div>


        <div class="admin-chart-heading">
            <div class="admin-chart">
                <h2> PROFIT OVERVIEW </h2>
            </div>
        </div>


        <div class="admin-chart-box">
            <div class="admin-chart">
                <h2> Profit (Monthly) </h2>
                <canvas id="monthly-profit-line-chart"></canvas>

                <script>
                    fetch('<?php echo URLROOT ?>/Admin_api_controller/adminProfitLineChart')
                        .then(response=>response.json())
                        .then(result=>{
                            const months = result.map(item=>item.month)
                            const profits = result.map(item=>item.profit)

                            const lineChart = new Chart(document.getElementById('monthly-profit-line-chart'),{
                                type: 'line',
                                data: {
                                    labels:months,
                                    datasets:[{
                                        label:'Profit over month',
                                        data:profits,
                                        borderColor: 'rgb(255, 102, 178)',
                                        tension: 0.1
                                    }]
                                }
                            });

                        })

                        .catch(error=>console.log(error))
                </script>

            </div>
        </div>



        <div class="admin-chart-box">
            <div class="admin-chart">
                <h2> Profit  </h2>

                <div class="content-table">
                    <table class="full-table">
                        <tr>

                            <th>Owner NIC</th>
                            <th>Month</th>
                            <th>Profit</th>

                        </tr>

                        <?php foreach($data['profit'] as $profit) : ?>
                            <tr>

                                <td><?php echo $profit->owner_nic?></td>
                                <td><?php echo $profit->month?></td>
                                <td>LKR <?php echo number_format($profit->profit, 2, '.', ',')?></td>
                                
                            </tr>

                        <?php endforeach;  ?>    
                    </table>
                </div>

            </div>

        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>