<input type="checkbox" id="menu">
<?php     
        // show the active tab

        function highlight($active, $link){
            if(isset($active)){
                if($active == $link){
                    echo "active";
                }else{
                    echo "";
                }
            }
        }    
    ?>
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
            <!-- <?php if(isset($_SESSION['user_pic'])): ?>
               
            <?php else: ?>
                <img src="<?php echo URLROOT; ?>/img/profile-pic/<?php echo $_SESSION['user_pic']; ?>" alt="Pic">
            <?php endif; ?> -->
            <img src="<?php echo URLROOT; ?>/img/profile-pic/<?php echo $_SESSION['user_pic']; ?>" alt="Pic">

        </div>
    </div>
</div>

<div class="side-menu">
    <!-- active tab -->
    <!-- -------------->
    <div class="side-heading">
        <a href="<?php echo URLROOT; ?>/pages/index">
            <img src="<?php echo URLROOT; ?>/img/logo-black.png" alt="Logo" srcset="">
        </a>
        <label for="menu" class="close-btn action-btn">
            <i class="fa fa-times"></i>
        </label>
    </div>
    <a href="<?php echo URLROOT; ?>/Staff_dashboard/staff_dash" class='<?php highlight($active, "dashboard") ?>'><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
    <a href="<?php echo URLROOT; ?>/Staff_home/staffhome" class='<?php highlight($active, "announcement") ?>'><i class="fa-solid fa-scroll"></i><span>Announcement</span></a>
    <a href="<?php echo URLROOT; ?>/Staff_view_users/view_users"class='<?php highlight($active, "users") ?>'><i class="fa-solid fa-users"></i><span>Users</span></a>
    <!-- <a href="#"><i class="fa-solid fa-calendar-days"></i><span>Calender</span></a> -->
    <a href="<?php echo URLROOT; ?>/Staff_schedule/view_schedule" class='<?php highlight($active, "schedule") ?>'><i class="fa-solid fa-table-list"></i><span>Schedule</span></a>
    <a href="<?php echo URLROOT; ?>/Staff_requests/view_requests" class='<?php highlight($active, "requests") ?>'><i class="fa-solid fa-user-plus"></i><span>Requests</span></a>
    <a href="<?php echo URLROOT; ?>/Staff_profile/viewprofile" class='<?php highlight($active, "profile") ?>'><i class="fa-solid fa-user"></i><span>Profile</span></a>
    <a href="<?php echo URLROOT; ?>/Users/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>

</div>
