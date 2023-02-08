<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages-style/contact-us-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <!-- include navigation bar -->
    <?php require APPROOT . '/views/inc/pages_navbar.php' ?>

    <h1>Contact Us</h1>

    <!-- contact us form -->
    <form action="<?php echo URLROOT; ?>/pages/contact_us" method="POST">
        <div class="name">
            <label for="name">Name:</label> <br>
            <input type="text" name="name" placeholder="Enter your name" value="<?php echo $data['name']; ?>" maxlength="50"> <br>
            <span><?php echo $data['name_err']; ?></span>
        </div>

        <div class="email">
            <label for="email">Email:</label> <br>
            <input type="email" name="email" placeholder="Enter your email" value="<?php echo $data['email']; ?>" maxlength="255"> <br>
            <span><?php echo $data['email_err']; ?></span>
        </div>

        <div class="mobileNo">
            <label for="mobileNo">Mobile No:</label> <br>
            <input type="tel" name="mobileNo" placeholder="Enter your mobile no" value="<?php echo $data['mobileNo']; ?>" maxlength="10"> <br>
            <span><?php echo $data['mobileNo_err']; ?></span>
        </div>
        
        <div class="subject">
            <label for="subject">Subject:</label> <br>
            <select name="subject">
                <option value="default">Select subject</option>
                <option value="getting_info">Getting information</option>
                <option value="payment_issue">Payment issue</option>
                <option value="service_issue">Service issue</option>
                <option value="other">Other</option>
            </select> <br>
            <span><?php echo $data['subject_err']; ?></span>
        </div>

        <div class="message">
            <label for="message">Message:</label> <br>
            <textarea name="message" rows="4" placeholder="Enter your message..."><?php echo $data['message'] ?></textarea> <br>
            <span><?php echo $data['message_err']; ?></span>
        </div>

        <div class="btn">
            <button><span></span>Send</button>
        </div>
    </form>
</body>
</html>
