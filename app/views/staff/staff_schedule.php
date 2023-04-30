<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffschedule-style.css" />
</head>
<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>    

    <div class="container"> 
        <div class="schedule-container">
            <div class="addnewbtn">
                 <a href="<?php echo URLROOT?>/Staff_schedule/create_schedule"><i class="fa-solid fa-circle-plus"></i>Add New</a>
            </div>     
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bus No</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Day</th>
                        <th>Arrival time</th>
                        <th>Departure time</th>
                        <th>Ticket Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count = 0;
                foreach($data as $schedule){
                        $count = $count + 1;
                    ?>
                    <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo $schedule->bus_no?></td>
                        <td><?php echo $schedule->Location_from?></td>
                        <td><?php echo $schedule->Location_to?></td>
                        <td><?php echo $schedule->day?></td>
                        <td><?php echo $schedule->arrival_time?></td>
                        <td><?php echo $schedule->departure_time?></td>
                        <td><?php echo $schedule->ticket_price?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
        
</body>
</html>