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
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <form action="<?php echo URLROOT; ?>/passenger_book_seats/journey_details" method="POST">
            <h1 class="heading">Journey Details</h1>

            <div class="from">
                <label for="from">From</label> <br>
                <select name="from" id="from">
                    <option value="default" <?php if (isset($_POST['from']) && $_POST['from'] == 'default') echo 'selected'; ?>>Select location</option>
                    <option value="Galle" <?php if (isset($_POST['from']) && $_POST['from'] == 'Galle') echo 'selected'; ?>>Galle</option>
                    <option value="Makumbura" <?php if (isset($_POST['from']) && $_POST['from'] == 'Makumbura') echo 'selected'; ?>>Makumbura</option>
                    <option value="Matara" <?php if (isset($_POST['from']) && $_POST['from'] == 'Matara') echo 'selected'; ?>>Matara</option>
                </select>
                <span class="err"><?php echo $data['from_err']; ?></span>
            </div>

            <div class="to">
                <label for="to">To</label> <br>
                <select name="to" id="to">
                    <option value="default" <?php if (isset($_POST['to']) && $_POST['to'] == 'default') echo 'selected'; ?>>Select location</option>
                    <option value="Galle" <?php if (isset($_POST['to']) && $_POST['to'] == 'Galle') echo 'selected'; ?>>Galle</option>
                    <option value="Makumbura" <?php if (isset($_POST['to']) && $_POST['to'] == 'Makumbura') echo 'selected'; ?>>Makumbura</option>
                    <option value="Matara" <?php if (isset($_POST['to']) && $_POST['to'] == 'Matara') echo 'selected'; ?>>Matara</option>
                </select>
                <span class="err"><?php echo $data['to_err']; ?></span>
            </div>

            <div class="date">
                <label for="date">Date</label> <br>
                <input type="date" name="date" id="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>">
                <span class="err"><?php echo $data['date_err']; ?></span>
            </div>

            <div class="count">
                <label for="count">No. of passengers</label> <br>
                <select name="count">
                    <option value="default" <?php if (isset($_POST['count']) && $_POST['count'] == 'default') echo 'selected'; ?>>Select number</option>
                    <option value="1" <?php if (isset($_POST['count']) && $_POST['count'] == '1') echo 'selected'; ?>>1</option>
                    <option value="2" <?php if (isset($_POST['count']) && $_POST['count'] == '2') echo 'selected'; ?>>2</option>
                    <option value="3" <?php if (isset($_POST['count']) && $_POST['count'] == '3') echo 'selected'; ?>>3</option>
                    <option value="4" <?php if (isset($_POST['count']) && $_POST['count'] == '4') echo 'selected'; ?>>4</option>
                    <option value="5" <?php if (isset($_POST['count']) && $_POST['count'] == '5') echo 'selected'; ?>>5</option>
                </select>
                <span class="err"><?php echo $data['count_err']; ?></span>
            </div>

            <div class="btn">
                <button type="submit">Find</button>
            </div>
        </form>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/journey-details-js.js"></script>
</body>

</html>