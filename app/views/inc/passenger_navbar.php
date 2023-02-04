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
        <small><b>Hi! <?php echo $_SESSION['user_fname'] ?></b></small>
        
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
    
    <a href="<?php echo URLROOT; ?>/passenger_book_seats/journey_details"><i class="fa-solid fa-magnifying-glass-arrow-right"></i><span>Book Seats</span></a>
    <a href="#"><i class="fa-solid fa-ticket-simple"></i><span>Bookings</span></a>
    <a href="#"><i class="fa-solid fa-clock-rotate-left"></i><span>History</span></a>
    <a href="#"><i class="fa-solid fa-credit-card"></i><span>Bank Cards</span></a>
    <a href="#"><i class="fa-solid fa-location-dot"></i><span>Map</span></a>
    <a href="#"><i class="fa-solid fa-bell"></i><span>Notifications</span></a>
    <a href="#"><i class="fa-solid fa-user"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>