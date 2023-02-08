<input type="checkbox" id="menu">

<div class="topbar">
    <div class="logo">
         <a href="<?php echo URLROOT; ?>/pages/index">
            <img src="<?php echo URLROOT; ?>/img/logo.png" alt="taptobus" srcset="">
         </a>
    </div>
    <label for="menu" class="menu-bar action-btn">
        <i class="fa fa-bars"></i>
    </label>
    <div class="topright">        
        <small><b>Hi! <?php echo $_SESSION['user_fname'] ?></b></small>
        <div class="picon">            
            <?php if(isset($_SESSION['user_pic'])): ?>
                <!--  -->
            <?php else: ?>
                <img src="<?php echo URLROOT; ?>/img/profile.jpeg" alt="Profile Pic">
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
    <a href="<?php echo URLROOT; ?>/Staff_home/staffhome" class="active"><i class="fa-sharp fa-solid fa-house"></i><span>Home</span></a>
    <a href="<?php echo URLROOT; ?>/Staff_view_users/view_users"><i class="fa-solid fa-users"></i><span>Users</span></a>
    <a href="#"><i class="fa-solid fa-calendar-days"></i><span>Calender</span></a>
    <a href="#"><i class="fa-solid fa-table-list"></i><span>Shedule</span></a>
    <a href="<?php echo URLROOT; ?>/Staff_requests/view_requests"><i class="fa-solid fa-user-plus"></i><span>Requests</span></a>
    <!-- <a href="#"><i class="fa-solid fa-bell"></i><span>Notifications</span></a> -->
    <a href="<?php echo URLROOT; ?>/Staff_profile/viewprofile"><i class="fa-solid fa-user"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/Users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>
