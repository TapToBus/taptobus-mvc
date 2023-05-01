<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffcreateschedule-style.css" />
</head>
<body>
    <?php require APPROOT . '/views/inc/staff_navbar.php' ?>    

    <div class="container">     

        <form action="<?php echo URLROOT?>/Staff_schedule/create_schedule" method="POST">
            <div class="form_control">
                <label for="bus_no">Bus No</label>
                <input type="text" name="bus_no" id="bus_no"/>
            </div>
            <div class="form_control">
                <label for="bus_no">Location From</label>
                <select name="location_from" id="location_from">
                    <option value="Galle">Galle</option>
                    <option value="Makubura">Makubura</option>
                </select>
            </div>
            <div class="form_control">
                <label for="bus_no">Location To</label>
                <select name="location_to" id="location_to">
                    <option value="Galle">Galle</option>
                    <option value="Makubura">Makubura</option>
                </select>
            </div>
            <div class="form_control">
                <label for="bus_no">Day</label>
                <select name="day" id="day">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednessday">Wednessday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Satureday">Satureday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <div class="form_control">
                <label for="arrival_time">Arrival Time</label>
                <input type="time" name="arrival_time" id="arrival_time"/>
            </div>
            <div class="form_control">
                <label for="departrue_time">Departure Time</label>
                <input type="time" name="departrue_time" id="departrue_time"/>
            </div>
            <div class="form_control">
                <label for="ticket_price">Ticket Price</label>
                <input type="text" name="ticket_price" id="ticket_price"/>
            </div>
            <div class="form_control">
                <button type="submit" name="createScheduleBtn" >Create</button>
            </div>
        </form>

    </div>
        
</body>
</html>