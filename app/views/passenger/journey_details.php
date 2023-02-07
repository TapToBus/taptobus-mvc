<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/journey-details-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <!-- include passenger navbar -->
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <!-- page content -->
    <div class="main">
        <div class="form">
            <!-- form to get journey details -->
            <form action="<?php echo URLROOT; ?>/passenger_book_seats/journey_details" method="POST">
                <h2>Journey Details</h2>

                <div class="from">
                    <label for="from">From</label> <br>
                    <select name="from">
                        <option value="default">Select starting point</option>
                        <option value="galle">Galle</option>
                        <option value="hambantota">Hambantota</option>
                        <option value="kadawatha">Kadawatha</option>
                        <option value="mathara">Mathara</option>
                        <option value="makumbura">Makumbura</option>
                    </select> <br>
                    <span><?php echo $data['from_err']; ?></span>
                </div>

                <div class="to">
                    <label for="to">To</label> <br>
                    <select name="to">
                        <option value="default">Select ending point</option>
                        <option value="galle">Galle</option>
                        <option value="hambantota">Hambantota</option>
                        <option value="kadawatha">Kadawatha</option>
                        <option value="mathara">Mathara</option>
                        <option value="makumbura">Makumbura</option>
                    </select> <br>
                    <span><?php echo $data['to_err']; ?></span>
                </div>

                <div class="date">
                    <label for="date">Date</label> <br>
                    <input type="date" name="date"> <br>
                    <span><?php echo $data['date_err']; ?></span>
                </div>

                <div class="count">
                    <label for="count">No of passengers</label> <br>
                    <select name="count">
                        <option value="default">Select passenger count</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> <br>
                    <span><?php echo $data['count_err']; ?></span>
                </div>

                <div class="btn">
                    <button>Find</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>