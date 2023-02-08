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
        <small><b>Hi! Kithsandu</b></small>
        
        <div class="picon">
            <img src="<?php echo URLROOT; ?>/img/profile-pic.jpg" alt="Profile Pic">
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
    
    <a href="<?php echo URLROOT; ?>/Admin_view_staff_member/view_staff_member"><i class="fa-solid fa-user"></i><span>Staff </span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_bus_owner/view_bus_owner"><i class="fa-solid fa-user-tie"></i><span>Owners</span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_bus_conductor/view_bus_conductor"><i class="fa-solid fa-person-chalkboard"></i><span>Conductors</span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_bus_driver/view_bus_driver"><i class="fa-solid fa-person"></i></i><span>Drivers</span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_bus/view_bus"><i class="fa-solid fa-bus"></i><span>Buses</span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_passenger/view_passenger"><i class="fa-solid fa-person-circle-plus"></i><span>Passengers</span></a>
    <a href="<?php echo URLROOT; ?>/Admin_remove_user_dashboard/remove_user_dashboard"><i class="fa-solid fa-person-circle-xmark"></i><span>Remove</span></a>
    <!-- <a href="#"><i class="fa-solid fa-user"></i><span>Remove history</span></a> -->
    <a href="#"><i class="fa-solid fa-address-card"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>