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
                        <h2>SPECIAL NOTICES</h2>
                        <div class="add-notice">
                            <button id="addnotice" class="addnotice" onclick="openModal()"><i class="fa-solid fa-circle-plus"></i> Add Notice</button>
                        </div>
                        <div class="grid">
                            <div class="text-fields">
                                <div class="notice-author-timestamp">
                                    <div class="notice-author">
                                        <p class="author-text">fname</p>
                                        <p class="author-text">lname</p>
                                    </div>
                                    <p class="time">date</p>
                                </div>
                                <form>
                                    <input type="text" name="title" id="title" value="sample text">
                                    <textarea name="description" id="text-area" cols="30" rows="5" placeholder="text area"></textarea>
                                    <div class="save-cancel-btns" id="save-cancel-btns">
                                        <button type="submit" name="save" class="save-btn">Save</button>
                                        <button type="submit" name="cancel" class="cancel-btn">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="edit-delete-btns">
                                <button class="edit-btn" onclick=""><i class="fa-solid fa-pen"></i></button>
                                <button class="delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>            
                    </div>

                    <?php
                    // controlller eken pass krana $data kiyna associative array eka athule thamyi result obj eka tyenne. ekanisaa result access karann nm me vidiyta gann one. 
                    $results = $data['result'];
                    // var_dump($results);
                    // -------------


                    foreach($results as $result){

                        var_dump($result);
                        echo "<br/>";

                    }
                    
                    ?>

                </div>
                <dialog class="notice-modal">
                    <div class="notice-container">
                        <div class="notice-header">
                            <h1>Add special notices</h1>
                            <button onclick="closeModal()">
                                <i class="fa-sharp fa-solid fa-circle-xmark"></i>
                            </button>
                        </div>
                        <form action="<?php echo URLROOT?>/Staff_home/staffhome" method="post">
                            <div class="date">
                                <label class="valid_period">Valid Time Period</label>
                                <div class="fromD">
                                    <label for="">From : </label>
                                    <input type="date" class="date_from" id="date_from" name="date_from">
                                </div>
                                <div class="toD">
                                    <label for="">To : </label>
                                    <input type="date" class="date_to" id="date_to" name="date_to">    
                                </div>
                            </div>
                            <div class="available_users">
                                <label class="available_for"><B>  Available for: </B></label>
                                <div class="dropdown">
                                    <div class="select">
                                        <span class="selected">All</span>
                                        <div class="caret"><i class="fa-sharp fa-solid fa-caret-down"></i></div>
                                    </div>
                                    <ul class="dropmenu">
                                        <li class="atv">All</li>
                                        <li>Passengers</li>
                                        <li>Owners</li>
                                        <li>Drivers</li>
                                        <li>Conductors</li>
                                        <li>Staff</li>
                                    </ul>
                                </div>                                
                            </div>
                            <input type="text" placeholder="Title" name="title">
                            <textarea name="description" placeholder="Notice description..."></textarea>
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
     