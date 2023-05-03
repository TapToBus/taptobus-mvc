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

    <div class="container">

    </div>

    <div class="topright">

        <div class="message">
            <i class="fa-solid fa-message"></i>
        </div>

        <div class="nortification">
            <i class="fa-solid fa-bell"></i>
        </div>

        <div class="vl"></div>

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

    <a href="<?php echo URLROOT; ?>/Admin_dashboard/view_admin_dashboard"><i class="fa-solid fa-chart-line"></i><span>Dashboard </span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_user_dashboard/view_user_dashboard"><i class="fa-solid fa-person"></i><span>Users </span></a>
    <a href="<?php echo URLROOT; ?>/Admin_remove_user_dashboard/remove_user_dashboard"><i class="fa-solid fa-clock-rotate-left"></i><span>Restore</span></a>
    <!-- <a href="<?php echo URLROOT; ?>/Admin_view_bus_owner/view_bus_owner"><i class="fa-solid fa-user-tie"></i><span>Remove</span></a> -->
    <!-- <a href="<?php echo URLROOT; ?>/Admin_history/view_admin_history"><i class="fa-solid fa-clock-rotate-left"></i><span>History</span></a>
    <a href="<?php echo URLROOT; ?>/Admin_view_bus_driver/view_bus_driver"><i class="fa-solid fa-file"></i><span>Reports</span></a> -->

    <!-- <a href="#"><i class="fa-solid fa-user"></i><span>Remove history</span></a> -->
    <a href="#"><i class="fa-solid fa-address-card"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>