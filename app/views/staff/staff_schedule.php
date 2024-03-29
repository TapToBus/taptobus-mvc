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
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffcreateschedulemodal-style.css" />
</head>
<body>

<!-- Add new schedule Model -->
<dialog id="addNewScheduleModal" class="modal" onsubmit="return validateAddScheduleForm()">
        <div class="modal__container">
            <div class="caption">
                <h1>Add New Schedule</h1>
            </div>
            <form action="<?php echo URLROOT?>/Staff_schedule/create_schedule" method="POST">
                <div class="form_control">
                    <label for="bus_no" class="required">Bus No</label>
                    <input type="text" name="bus_no" id="bus_no" required/>
                </div>
                <div class="row">
                    <div class="form_control">
                        <label for="location_from" >Location From</label>
                        <select name="location_from" id="location_from"  class="location-select">
                            <option value="Galle">Galle</option>
                            <option value="Makubura">Makumbura</option>
                        </select>
                    </div>
                    <div class="form_control">
                        <label for="location_to" >Location To</label>
                        <select name="location_to" id="location_to"  class="location-select">
                            <option value="Makubura">Makumbura</option>
                            <option value="Galle">Galle</option>
                        </select>
                    </div>
                </div>
                <div class="form_control">
                    <label for="day" >Day</label>
                    <select name="day" id="day"  required>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Satureday">Satureday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form_control">
                        <label for="arrival_time"  class="required">Arrival Time</label>
                        <input type="time" name="arrival_time" id="arrival_time" required/>
                    </div>
                    <div class="form_control">
                        <label for="departrue_time"  class="required">Departure Time</label>
                        <input type="time" name="departrue_time" id="departrue_time" required/>
                    </div>
                </div>
                <div class="form_control">
                    <label for="ticket_price"  class="required">Ticket Price</label>
                    <input type="number" name="ticket_price" id="ticket_price" required/>
                </div>
                <div class="button_control">
                    <button type="button" onclick="closeAddNewScheduleModal()" >Cancel</button>
                    <button type="submit" name="createScheduleBtn" >Create</button>
                </div>
            </form>
        </div>
    </dialog>
   <!-- Delete schedule Model -->
    <dialog id="deleteConfirmModal" class="alertModal">
        <div class="alert__container">
                <i class="fa-solid fa-circle-xmark"></i>
                <h1>Are you sure?</h1>
                <p>Do you realy want to delete this schedule? this process can't be undone.</p>
            <form class="button_control" action="<?php echo URLROOT?>/Staff_schedule/delete_schedule" method="POST">
                <button type="button" onclick="closeDeleteConfirmationModal()" >No, Cancel</button>
                <input type="hidden" name="bus_no" id="d-bus_no" />
                <button type="submit" name="deleteBtn" id="deleteBtn" >Yes, Delete</button>
            </form>
        </div>
    </dialog>

<!-- Edit schedule Model -->
    <dialog id="editScheduleModal" class="modal">
        <div class="modal__container">
            <div class="caption">
                <h1>Edit Schedule</h1>
            </div>
            <form action="<?php echo URLROOT?>/Staff_schedule/edit_schedule" method="POST">
                <div class="form_control">
                    <label for="bus_no">Bus No</label>
                    <input type="text" name="bus_no" id="u-bus_no"/>
                </div>
                <div class="row">
                    <div class="form_control">
                        <label for="bus_no">Location From</label>
                        <select name="location_from" id="u-location_from"  class="u-location-select">
                            <option value="Galle">Galle</option>
                            <option value="Makubura">Makumbura</option>
                        </select>
                    </div>
                    <div class="form_control">
                        <label for="bus_no">Location To</label>
                        <select name="location_to" id="u-location_to" class="u-location-select">
                            <option value="Makubura">Makumbura</option>
                            <option value="Galle">Galle</option>
                        </select>
                    </div>
                </div>
                <div class="form_control">
                    <label for="u-day">Day</label>
                    <select name="day" id="u-day">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Satureday">Satureday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form_control">
                        <label for="arrival_time">Arrival Time</label>
                        <input type="time" name="arrival_time" id="u-arrival_time"/>
                    </div>
                    <div class="form_control">
                        <label for="departrue_time">Departure Time</label>
                        <input type="time" name="departrue_time" id="u-departrue_time"/>
                    </div>
                </div>
                <div class="form_control">
                    <label for="ticket_price">Ticket Price</label>
                    <input type="number" name="ticket_price" id="u-ticket_price"/>
                </div>
                <div class="button_control">
                    <button type="button" onclick="closeEditScheduleModal()" >Cancel</button>
                    <button type="submit" name="editScheduleBtn" id="editBtn" >Save</button>
                </div>
            </form>
        </div>
    </dialog>


    <?php 
     $active = "schedule";
    require APPROOT . '/views/inc/staff_navbar.php' 
    ?>    

    <div class="container"> 
        <div class="schedule-container">
            <div class="top">
                <h2>Bus Schedule</h2>
                <div class="add-edit-btns">
                    <button class="addNew__button" onclick="openAddNewScheduleModal()">
                        <i class="fa-solid fa-circle-plus"></i>
                        <p>Add New</p>
                    </button>
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
                        <th></th>
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
                        <td><?php echo $schedule->from?></td>
                        <td><?php echo $schedule->to?></td>
                        <td><?php echo $schedule->day?></td>
                        <td><?php echo $schedule->arrival_time?></td>
                        <td><?php echo $schedule->departure_time?></td>
                        <td><?php echo $schedule->ticket_price?></td>
                        <td>                                                                                                                                      
                                                                                                                                                        <!-- pass all the retrieve data to the Model -->
                            <button class="table__button" <?php if(isset($schedule->bid)) echo "disabled"?> onclick='openEditScheduleModal(<?php echo json_encode($schedule)?>)'><i class="fa fa-edit"></i></button>  
                            <button class="table__button" <?php if(isset($schedule->bid)) echo "disabled"?> onclick= 'openDeleteConfirmationModal("<?php echo $schedule->id ?>", "<?php echo $schedule->bus_no ?>")'><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script  src="<?php echo URLROOT;?>/js/staff/scheduleValidation.js" ></script>
</body>
</html>