<div class="navbar-top">
    <div class="logo">
        <img src="<?php echo URLROOT; ?>/img/logo.png" alt="Logo">
    </div>
    
    <div class="right">
        <p>Hi <?php echo $_SESSION['user_fname'] ?></p>
        
        <div class="profile-pic">
            <img src="<?php echo URLROOT; ?>/img/profile-pic/<?php echo $_SESSION['user_pic']; ?>" alt="Pic">
        </div>
    </div>
</div>

<div class="navbar-side">
    <a href="<?php echo URLROOT; ?>/passenger_book_seats/journey_details"><i class="fa-solid fa-magnifying-glass-arrow-right"></i><span>Book Seats</span></a>
    <a href="<?php echo URLROOT; ?>/passenger_bookings/bookings"><i class="fa-solid fa-ticket-simple"></i><span>Bookings</span></a>
    <a href="<?php echo URLROOT; ?>/passenger_history/history"><i class="fa-solid fa-clock-rotate-left"></i><span>History</span></a>
    <a href="<?php echo URLROOT; ?>/passenger_notifications/notifications"><i class="fa-solid fa-bell"></i><span>Notifications</span></a>
    <a href="<?php echo URLROOT; ?>/passenger_profile/profile"><i class="fa-solid fa-user"></i><span>Profile</span></a>
    <a href="#"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
    <a class="logout" href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
</div>