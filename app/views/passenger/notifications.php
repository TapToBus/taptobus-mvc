<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/notifications-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <div class="content">
            <h1 class="heading">Notifications</h1>

            <div class="scrolle">
                <?php if (empty($data)) : ?>
                    <div class="no-data">
                        <i class="fa-solid fa-circle-exclamation"></i> <br>
                        <span>No notifications to display</span>
                    </div>
                <?php else : ?>

                    <?php foreach ($data as $row) : ?>

                        <div class="result" onclick="this.classList.toggle('expanded')">
                            <div class="row1">
                                <span class="title"><?php echo $row->title; ?></span>
                                <span class="date-time"><?php echo $row->date . '  ' . date('h:i a', strtotime($row->time)); ?></span>
                            </div>
                            <div class="row2">
                                <span class="desc"><?php echo $row->description; ?></span>
                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <script>
        var resultDivs = document.querySelectorAll(".result");

        resultDivs.forEach(function(div) {
            div.addEventListener("click", function() {
                var descDiv = div.querySelector(".row2");
                descDiv.classList.toggle("show");
            });
        });
    </script>
</body>

</html>