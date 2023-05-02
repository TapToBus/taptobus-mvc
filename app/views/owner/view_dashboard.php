<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/dashboard-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">


        <div class="today">

            <!-- <div class="content"> -->
            <p><span id="date"></span><span id="day"></span>,<span id="month"></span></p>
            <!-- </div> -->

        </div>

        <div class="piechart">

            <div>
                <h2>Weekly Income</h2>
            </div>

            <canvas id="myChart"></canvas>

            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var data = <?php echo json_encode($data); ?>;

                const labels = Object.keys(data);

                const dates = []
                let today = new Date();
                for (let i = 0; i < 7; i++) {
                    let date = new Date(today);
                    date.setDate(date.getDate() - i);
                    let formattedDate = date.toISOString().substr(0, 10);
                    dates.push(formattedDate);
                }

                const extractData = (row) => {
                    temp = [0, 0, 0, 0, 0, 0, 0]
                    for (d in row) {
                        if (dates.includes(d)) {
                            temp[dates.indexOf(d)] = row[d]
                        }
                    }
                    return temp;
                }

                data1 = extractData(data[labels[0]])
                data2 = extractData(data[labels[1]])
                data3 = extractData(data[labels[2]])

                console.log(labels, dates, data1, data2, data3)

                new Chart("myChart", {
                  type: "line",
                  data: {
                    responsive: true,
                    labels: dates,
                    datasets: [{
                      label: labels[0],
                      data: extractData(data[labels[0]]),
                      borderColor: "#22a7f0",
                      fill: false
                    }, {
                      label: labels[1],
                      data: extractData(data[labels[1]]),
                      borderColor: "#48b5c4",
                      fill: false
                    }, {
                      label: labels[2],
                      data: extractData(data[labels[2]]),
                      borderColor: "#a6d75b",
                      fill: false
                    }]
                  },
                  options: {
                    legend: {
                      display: true,
                      position: 'bottom'
                    },
                    aspectRatio: 1.7
                  }
                });
            </script>


        </div>

        <div class="boxes">

            <div class="box">

                <div class="images">
                    <img src="<?php echo URLROOT; ?>/img/owner_img/bus12.png">
                </div>

                <div class="words">
                    <p class="word1">Total Buses</p>
                    <p class="word2">4</p>
                    <hr>
                </div>

            </div>

            <div class="box">

                <div class="images">
                    <img src="<?php echo URLROOT; ?>/img/owner_img/user2.png">
                </div>

                <div class="words">
                    <p class="word1">Total Drivers</p>
                    <p class="word2">5</p>
                    <hr>
                </div>

                <!-- <hr > -->

            </div>

            <div class="box">

                <div class="images">
                    <img src="<?php echo URLROOT; ?>/img/owner_img/user1.png">
                </div>

                <div class="words">
                    <p class="word1">Total Conductors</p>
                    <p class="word2">6</p>
                    <hr>
                </div>
            </div>

        </div>


    </div>

    <!-- <script type="text/javascript " src="<?php echo URLROOT; ?>/js/owner-js/dashboard.js"> </script> -->
</body>

</html>