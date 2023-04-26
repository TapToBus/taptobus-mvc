<input type="checkbox" id="menu">

<div class="topbar">
    <div class="logo">
        <a href="<?php echo URLROOT; ?>/pages/index">
            <img src="<?php echo URLROOT; ?>/img/logo.png" alt="Logo" srcset="">
        </a>
    </div>
    
    <label for="menu" class="menu-bar action-btn">
        <i class="fa fa-bars"></i>
    </label>
    
    <div class="topright">
        <small><b>Hi! <?php echo $_SESSION['user_fname'] ?> </b></small>
        
        <div class="picon">
            <?php if(isset($_SESSION['user_pic'])): ?>
                <!--  -->
            <?php else: ?>
                <img src="<?php echo URLROOT; ?>/img/default-profile-pic.jpg" alt="Profile Pic">
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="side-menu">
    <div class="side-heading">
        <a href="<?php echo URLROOT; ?>/pages/index">
            <img src="<?php echo URLROOT; ?>/img/logo-black.png" alt="Logo" srcset="">
        </a>

        <label for="menu" class="close-btn action-btn">
            <i class="fa fa-times"></i>
        </label>
    </div>
    
    <a href="<?php echo URLROOT; ?>/conductor_bookings/check_booking s"><i class="fa-solid fa-square-check"></i><span>Check Bookings</span></a>
    <a href="<?php echo URLROOT; ?>/conductor_incomerecords/add_incomerecords"><i class="fa-solid fa-note-sticky"></i><span>Income Records</span></a>
    <a href="<?php echo URLROOT; ?>/conductor_schedule/view_schedule"><i class="fa-solid fa-calendar-days"></i><span>Schedule</span></a>
    <a href="<?php echo URLROOT; ?>/conductor_leaverequests/add_leaverequests"><i class="fa-solid fa-newspaper"></i><span>Leave Requests</span></a>
    <a href="<?php echo URLROOT; ?>/conductor_notifications/view_notifications"><i class="fa-solid fa-bell"></i><span>Notifications</span></a>
    <a href="#"><i class="fa-solid fa-user"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>

