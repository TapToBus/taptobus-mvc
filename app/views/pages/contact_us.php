<?php require APPROOT . '/views/inc/header.php' ?>
<?php require APPROOT . '/views/inc/pages_navbar.php' ?>

<h1>Contact Us</h1>

<form action="<?php echo URLROOT; ?>/pages/contact_us" method="POST">
    <div class="name">
        <label for="name">Name:<sup>*</sup></label> <br>
        <input type="text" name="name" placeholder="Enter your name"
        value="<?php echo $data['name']; ?>" maxlength="50"> <br>
        <span><?php echo $data['name_err']; ?></span>
    </div>

    <div class="email">
        <label for="email">Email:<sup>*</sup></label> <br>
        <input type="email" name="email" placeholder="Enter your email"
        value="<?php echo $data['email']; ?>" maxlength="255"> <br>
        <span><?php echo $data['email_err']; ?></span>
    </div>

    <div class="mobileNo">
        <label for="mobileNo">Mobile No:<sup>*</sup></label> <br>
        <input type="tel" name="mobileNo" placeholder="Enter your mobile no"
        value="<?php echo $data['mobileNo']; ?>" maxlength="10"> <br>
        <span><?php echo $data['mobileNo_err']; ?></span>
    </div>

    <div class="subject">
        <label for="subject">Subject:<sup>*</sup></label> <br>
        <select name="subject">
            <option value="" disabled selected>Select subject</option>
            <option value="getting_info">Getting information</option>
            <option value="payment_issue">Payment issue</option>
            <option value="service_issue">Service issue</option>
            <option value="other">Other</option>
        </select> <br>
        <span><?php echo $data['subject_err']; ?></span>
    </div>

    <div class="message">
        <label for="message">Message:<sup>*</sup></label> <br>
        <textarea name="message" rows="4" placeholder="Enter your message..."><?php echo $data['message'] ?></textarea> <br>
        <span><?php echo $data['message_err']; ?></span>
    </div>

    <div class="btn">
        <button><span></span>Send</button>
    </div>
</form>

<?php require APPROOT . '/views/inc/footer.php' ?>
