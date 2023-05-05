<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/history-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <h1 class="heading">History</h1>

        <div class="title">
            <span class="title0">No</span>
            <span class="title1">From</span>
            <span class="title2">To</span>
            <span class="title3">Date</span>
            <span class="title4">Time</span>
            <span class="title5">Bus No</span>
            <span class="title6">Status</span>
        </div>

        <?php if ($data['history'] == NULL) : ?>

            <div class="no-data">
                <i class="fa-solid fa-circle-exclamation"></i> <br>
                <span>No data to display</span>
            </div>

        <?php else : ?>

            <?php $count = 1; ?>

            <?php foreach ($data['history'] as $history) : ?>
                <div class="result" id="result">
                    <span class="result0"><?php echo $count++; ?></span>
                    <span class="result1"><?php echo $history->from; ?></span>
                    <span class="result2"><?php echo $history->to; ?></span>
                    <span class="result3"><?php echo date('Y-m-d', strtotime($history->started_datetime)); ?></span>
                    <span class="result4"><?php echo date('h:i a', strtotime($history->started_datetime)); ?></span>
                    <span class="result5"><?php echo $history->bus_no; ?></span>
                    <?php if($history->status == 'Used'): ?>
                        <span class="result6 used"><?php echo $history->status; ?>
                    <?php else: ?>
                        <span class="result6 cancelled"><?php echo $history->status; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

    <script src="<?php echo URLROOT; ?>/js/passenger-js/history-js.js"></script>
</body>

</html>