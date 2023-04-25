<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/conductor-style/view_leaverequests-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/conductor_navbar.php' ?>

    <div class="outer">

        <div class="container">


            <form action="" method="post" name="add_leaverequests-form" onsubmit="return isValid()">

                <h2>Add Leave Requests</h2>

                <div class="big">
                    <div class="row">
                        <div class="a">
                            <label>Date from</label>
                        </div>
                        <div class="b">
                            <input type="date" class="form-control" name="date_from" id="date_from" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="a">
                            <label>Date to</label>
                        </div>
                        <div class="b">
                            <input type="date" class="form-control" name="date_to" id="date_to" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="a">
                            <label>reason</label>
                        </div>
                        <div class="b">
                            <textarea class="form-control" name="reason" id="reason" required></textarea>
                        </div>
                    </div>

                    <script>
                        const today = new Date().toISOString().split('T')[0];
                        const dateFrom = document.getElementById('date_from');
                        const dateTo = document.getElementById('date_to');
                        document.getElementById('date_from').setAttribute('min', today);

                        dateFrom.addEventListener("change", function() {

                            dateTo.min = this.value;
                        });

                        dateTo.addEventListener("change", function() {

                            dateFrom.disabled = true;
                        });
                    </script>


                </div>


                <div class="row">

                    <input type="submit" value="Submit">
                    <input type="submit" value="Cancel">

                </div>


            </form>


        </div>


        <div class="container2">

            <table>

                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Date From</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($data1 as $row) :

                    ?>

                        <tr>
                            <td><?php echo $row->request_id; ?></td>
                            <td><?php echo $row->date_from; ?></td>
                            <td><?php echo $row->status; ?></td>
                        </tr>

                    <?php

                    endforeach;

                    ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>