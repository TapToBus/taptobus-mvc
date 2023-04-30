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
    
    <a href="<?php echo URLROOT; ?>/owner_dashboard/view_dashboard"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
    <a href="<?php echo URLROOT; ?>/owner_buses/view_buses"><i class="fa-solid fa-bus"></i><span>Buses</span></a>
    <a href="<?php echo URLROOT; ?>/owner_conductors/view_conductors"><i class="fa-solid fa-user"></i><span>My Conductors</span></a>
    <a href="<?php echo URLROOT; ?>/owner_drivers/view_drivers"><i class="fa-solid fa-user"></i><span>My Drivers</span></a>
    <a href="<?php echo URLROOT; ?>/owner_leaverequests/view_leaverequests"><i class="fa-solid fa-newspaper"></i><span>Leave Requests</span></a>
    <a href="<?php echo URLROOT; ?>/owner_notifications/view_notifications"><i class="fa-solid fa-bell"></i><span>Notifications</span></a>
    <a href="#"><i class="fa-solid fa-user"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>