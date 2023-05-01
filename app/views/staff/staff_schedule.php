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
            <div class="top">
                <h2>Bus Schedule</h2>
                <div class="add-edit-btns">
                    <a href="<?php echo URLROOT?>/Staff_schedule/view_create_form">
                        <button class="button1">
                            <span class="button__text">Add New</span>
                            <span class="button__icon"><i class="fa-solid fa-circle-plus"></i></span>
                        </button>                    
                    </a> 
                    <a href="#">
                        <button class="button2">
                            <span class="button__text">Edit</span>
                            <span class="button__icon"><i class="fa-solid fa-pen"></i></span>
                        </button>                    
                    </a> 
                </div> 
            </div>             
            <table class="content-tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bus No</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Day</th>
                        <th>Arrival time</th>
                        <th>Departure time</th>
                        <th>Ticket Price (LKR)</th>
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
                        <td><?php echo $schedule->ticket_price.'.00'?></td>
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