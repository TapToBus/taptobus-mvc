<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/conductor-style/check_bookings-style.css">
  <title><?php echo SITENAME; ?></title>


</head>

<body>

  <?php require APPROOT . '/views/inc/conductor_navbar.php' ?>

  <div class="outer">

    <div class="container">

      <div class="search-box">

        <form action="<?php echo URLROOT; ?>/conductor_bookings/check_bookings" method="post" id="my-form">

          <input type="text" name="code" id="code" autocomplete="off" placeholder="Enter the code...">
          <button type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

        </form>

      </div>

      <div class="details">

        <?php

        foreach ($data as $row) :

        ?>

          <div class="info">
            <label for=""><b>Bus No. - </b> <?php echo $row->bus_no; ?></label>
            <label for=""><b>From - </b> <?php echo $row->from; ?> </label>
            <label for=""><b>To - </b> <?php echo $row->to; ?></label>
            <label for=""><b>Time - </b> <?php echo $row->departure_time; ?></label>
            <label for=""><b>Passenger Count - </b> <?php echo $row->passenger_count; ?></label>
            <label for=""><b>Booked Seats - </b> <?php echo $row->booked_seats; ?></label>

          </div>

        <?php

        endforeach;

        ?>

      </div>


    </div>


  </div>

</body>

</html>