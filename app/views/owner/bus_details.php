<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/busdetails-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.0/Chart.min.js"></script>
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="container">

        <div class="bus_no">
            <h2><?php echo $data->bus_no; ?></h2>
            <!-- <div class="ratings">
                <a>(</a>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <a>)</a>
            </div> -->
        </div>

        <div class="full">

            <div class="images">
                <img src="<?php echo URLROOT ?>/img/bus/<?php echo $data->bus_image; ?>" alt="" />
            </div>

            <!-- <h2>Bus Details</h2> -->

            <div class="bus_information">

                <div class="box">
                    <p class="word1">Root No</p>
                    <p class="word2"><?php echo $data->root_no; ?></p>
                </div>

                <div class="box">
                    <p class="word1">Capacity</p>
                    <p class="word2"><?php echo $data->capacity; ?></p>
                </div>

                <div class="box">

                    <i class="fa-solid fa-wifi fa-2x"></i>
                    <i class="fa-solid fa-tv fa-2x"></i>
                    <i class="fa-brands fa-usb fa-2x"></i>
                    <i class="fa-solid fa-fan fa-2x"></i>

                </div>


            </div>
        </div>

        <div class="employees">

            <div class="emp">

                <p>Conductor</p>
                <div class="images">
                    <?php if ($data2) : ?>
                        <img src="<?php echo URLROOT ?>/img/profile-pic/<?php echo $data2->pic; ?>" alt="" />
                    <?php else : ?>
                        <img src="<?php echo URLROOT ?>/img/profile-pic/default.jpg ?>" alt="" />
                    <?php endif; ?>

                </div>

                <form id="change_name" action="<?php echo URLROOT; ?>/owner_buses/change_conductor" method="POST">

                    <input type="hidden" name="bus_no" value="<?php echo $data->bus_no; ?>">

                    <?php if (isset($data2->ntcNo)) : ?>
                        <input type="hidden" name="old_con_id" value="<?php echo $data2->ntcNo; ?>">
                    <?php else : ?>
                        <input type="hidden" name="old_con_id" value="NULL">
                    <?php endif; ?>

                    <select class="choose" name="con_name" id="con_name">


                        <?php if ($data2) : ?>
                            <option value="<?php echo $data2->fname; ?>" selected><?php echo $data2->fname; ?></option>
                        <?php else : ?>
                            <option value="" selected></option>
                        <?php endif; ?>

                        <?php foreach ($data1 as $row) : ?>
                            <option value="<?php echo $row->fname; ?>"><?php echo $row->fname; ?></option>
                            <!-- aluth db ekee nama wenas ntcNo kiyna eka -->
                        <?php endforeach; ?>

                    </select>

                </form>


                <script>
                    var form = document.querySelector('#change_name');
                    var select = document.getElementById('con_name');
                    var selectedValue = select.value;

                    select.addEventListener('change', function(event) {

                        // Prevent the form from submitting normally
                        event.preventDefault();
                        // Get the selected value
                        var selectedConductor = select.value;

                        form.submit();

                    });
                </script>


            </div>

            <div class="emp">

                <p>Driver</p>
                <div class="images">
                    <?php if ($data5) : ?>
                        <img src="<?php echo URLROOT ?>/img/profile-pic/<?php echo $data5->pic; ?>" alt="" />
                    <?php else : ?>
                        <img src="<?php echo URLROOT ?>/img/profile-pic/default.jpg ?>" alt="" />
                    <?php endif; ?>
                </div>

                <form id="change_name2" action="<?php echo URLROOT; ?>/owner_buses/change_driver" method="POST">

                    <input type="hidden" name="bus_no" value="<?php echo $data->bus_no; ?>">

                    <?php if (isset($data5->ntcNo)) : ?>
                        <input type="hidden" name="old_dr_id" value="<?php echo $data5->ntcNo; ?>">
                    <?php else : ?>
                        <input type="hidden" name="old_dr_id" value="NULL">
                    <?php endif; ?>

                    <select class="choose" name="dr_name" id="dr_name">
                        <?php if ($data5) : ?>
                            <option value="<?php echo $data5->fname; ?>" selected><?php echo $data5->fname; ?></option>
                        <?php else : ?>
                            <option value="" selected></option>
                        <?php endif; ?>

                        <?php foreach ($data4 as $row) : ?>
                            <option value="<?php echo $row->fname; ?>"><?php echo $row->fname; ?></option>
                            <!-- aluth db ekee nama wenas ntcNo kiyna eka -->
                        <?php endforeach; ?>

                    </select>

                </form>


                <script>
                    var form2 = document.querySelector('#change_name2');
                    var select2 = document.getElementById('dr_name');
                    var selectedValue = select2.value;

                    select2.addEventListener('change', function(event) {

                        // Prevent the form from submitting normally
                        event.preventDefault();
                        // Get the selected value
                        var selectedConductor = select2.value;

                        form2.submit();

                    });
                </script>

            </div>

        </div>

        <div class="chart">

            <canvas id="myChart"></canvas>

            <script>
                var data3 = <?php echo json_encode($data3); ?>;
                var xValues = data3.xValues;
                // console.log(xValues);
                var yValues = data3.yValues;
                var barColors = ["#fd7f6f", "#7eb0d5", "#b2e061", "#bd7ebe", "#ffb55a", "#ffee65", "#beb9db"];

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Daily Income",
                            fontSize: 20,
                            color: 'red'

                        }
                    }
                });
            </script>


        </div>

    </div>

</body>

</html>