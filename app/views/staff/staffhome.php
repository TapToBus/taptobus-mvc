<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffhome-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/staffnavbar-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/calander-style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/staff-style/addnoticepopup-style.css" />
</head>

<body>
     <?php require APPROOT . '/views/inc/staff_navbar.php' ?> 

    <div class="container">
        <p>
            <div class="container1">
                <div class="notice-container">
                    <div class="card">
                        <h2>Announcement</h2>
                        <div class="add-notice">
                            <button id="addnotice" class="addnotice" onclick="openModal()"><i class="fa-solid fa-circle-plus"></i> Add Announcements</button>
                        </div>
                    </div>

                    <?php
                    // controlller eken pass krana $data kiyna associative array eka athule thamyi result obj eka tyenne. ekanisaa result access karann nm me vidiyta gann one. 
                    if(isset($data['alert'])){
                        $alert = $data['alert'];
                        echo($alert);
                        die();
                        ?>
                        <div>
                            <h1><?php echo $alert['message']?></h1>
                        </div>                        
                        <?php


                        if($alert['type'] == 'success'){
                            ?>
                             <div>
                                <h1>Successfully</h1>
                            </div> 
                            <?php
                        }

                        if($alert['type'] == 'error'){
                            ?>
                            <div>
                                <h1>Error</h1>
                            </div> 
                            <?php
                        }
                    }
                    ?>
                         <!-- for checked the loged user 
                         <h3>User -- > <?php echo $_SESSION['user_id'] ;?></h3>  -->
                    <?php

                    
                    if(isset($data['result']) && !empty($data['result'])){
                    $results = $data['result'];

                    foreach($results as $result){
                        ?>
                    <div class="grid">
                        <div class="text-fields">
                            <div class="notice-author-timestamp">
                                <div class="notice-author"> Staff : 
                                    <p class="author-text"><?php echo $result->first_name?></p>
                                    <p class="author-text"><?php echo $result->last_name?></p>
                                </div>
                                <p class="time"><?php echo $result->time_stamp?></p>
                            </div>
                            <form action="<?php echo URLROOT?>/Staff_home/editnotice" method="POST">
                                <input type="text" name="edit-title" id="title-<?php echo $result->notice_id ?>" value="<?php echo $result->title; ?>" disabled>
                                <textarea name="edit-description" id="text-area-<?php echo $result->notice_id ?>" cols="30" rows="5" disabled><?php echo $result->description; ?></textarea>
                                <p>Annoucment for :</p>
                                <ul class="usr">
                                    <?php foreach ($result->roles as $role) {
                                        ?>
                                            <li><?php echo $role?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="save-cancel-btns" id="save-cancel-btns-<?php echo $result->notice_id ?>">
                                    <button type="submit" name="notice-id" class="save-btn" value="<?php echo $result->notice_id?>" id="save-edit">Save</button>
                                    <button type="submit" name="cancel-btn" class="cancel-btn" id="cancel-edit">Cancel</button>
                                </div>
                            </form>         
                        </div>
                        <!-- display the edit buttons to the authorized user only -->
                        <?php if($result->staff_no == $_SESSION['user_id']):?>
                            <div class="edit-delete-btns">
                                <!-- <button class="edit-btn" onclick="enableEdit(<?php //echo $result->notice_id ?>)"><i class="fa-solid fa-pen"></i></button> -->
                                <a href="<?php echo URLROOT?>/Staff_home/deleteAnnouncement?notice_id=<?php echo $result->notice_id?>">
                                    <button class="delete-btn"><i class="fa-solid fa-trash"></i></button>
                                </a>
                            </div>
                        <?php endif;?>
                    </div>   
                     <?php
                       
                    }

                }else {
                    ?>
                    <div class="">
                        <h1>no data found</h1>
                    </div>
                    
                    <?php
                }
                    ?>

                </div>
                
                <!-- pop up model -->
                <dialog class="notice-modal">
                    <div class="notice-container">
                        <div class="notice-header">
                            <h2>Add Announcements</h2>
                            <button onclick="closeModal()">
                                <i class="fa-sharp fa-solid fa-circle-xmark"></i>
                            </button>
                        </div>
                        <form action="<?php echo URLROOT?>/Staff_home/staffhome" method="post">
                            <div class="date">
                                <label class="valid_period">Valid - </label><br>
                                <div class="fromD">
                                    <label for="date_from" class ="required">From : </label>
                                    <input type="date" class="date_from" id="date_from" name="date_from" required>
                                </div>
                                <div class="toD">
                                    <label for="date_to" class ="required">To : </label>
                                    <input type="date" class="date_to" id="date_to" name="date_to"required>    
                                </div>
                            </div>
                            <div class="available_users">
                                <div class="ttl">
                                    Available users - 
                                </div>
                               <div class="options">
                                    <div>
                                    <label>
                                        <input type="checkbox" name="role[]" value="owner">
                                        Owner
                                    </label>
                                    </div>
                                    <div>
                                    <label>
                                        <input type="checkbox" name="role[]" value="conductor">
                                        Conductor
                                    </label>
                                    </div>
                                    <div>
                                    <label>
                                        <input type="checkbox" name="role[]" value="driver">
                                        Driver
                                    </label>
                                    </div>
                                    <div>
                                    <label>
                                        <input type="checkbox" name="role[]" value="staff member" id="staff" checked >
                                        Staff Member
                                    </label>
                                    </div>
                                    <div>
                                    <label>
                                        <input type="checkbox" name="role[]" value="passenger">
                                        Passenger
                                    </label>
                                    </div>
                               </div>
                            </div>
                            <div class="form-control">
                                <label for="title" class ="required"> </label>
                                <input type="text" placeholder="Title" name="title" id = "title"  required>
                            </div>

                            <div class="form-control">
                                <label for="description" class ="required">  </label>
                                <textarea name="description" placeholder="Notice description..." id="description"  required></textarea>
                            </div>
                            

                            <button type="submit" name="save" id="addNotice">Add</button>
                        </form>
                    </div>
                </dialog>

                <div class="calander-container">
                    <div class="calendar-wrapper">
                        <button id="btnPrev" type="button">Prev</button>
                        <button id="btnNext" type="button">Next</button>
                        <div id="divCal"></div>
                    </div>
                </div>
                
            </div>
        </p>
    </div>
    
    <script  src="<?php echo URLROOT;?>/js/staff/staffhome.js" ></script>
    <script  src="<?php echo URLROOT;?>/js/staff/calander.js" ></script>
</body>

</html>
     