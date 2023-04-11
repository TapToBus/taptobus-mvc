<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/select-seats-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">

        <div class="seating-chart">
            <div class="row">
                <label for="seat1" class="seat-label">
                    <input type="checkbox" id="seat1" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat2" class="seat-label">
                    <input type="checkbox" id="seat2" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat3" class="seat-label">
                    <input type="checkbox" id="seat3" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat4" class="seat-label">
                    <input type="checkbox" id="seat4" class="seat" />
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="row">
                <label for="seat5" class="seat-label">
                    <input type="checkbox" id="seat5" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat6" class="seat-label">
                    <input type="checkbox" id="seat6" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat7" class="seat-label">
                    <input type="checkbox" id="seat7" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat8" class="seat-label">
                    <input type="checkbox" id="seat8" class="seat" />
                    <span class="checkmark"></span>
                </label>
                <label for="seat9" class="seat-label">
                    <input type="checkbox" id="seat9" class="seat" />
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>


    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/select-seats-js.js"></script>
</body>

</html>