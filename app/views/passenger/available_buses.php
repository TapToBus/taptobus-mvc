<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/available-buses-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/passenger_navbar.php' ?>

    <div class="main">
        <h1 class="heading">Available Buses</h1>

        <div class="summary">
            <span class="col1">
                <span class="sub-col1">Journey:</span>
                <span class="sub-col2"><?php echo $data['from'] ?> > <?php echo $data['to'] ?></span>
            </span>

            <span class="v-line">|</span>

            <span class="col2">
                <span class="sub-col1">On:</span>
                <span class="sub-col2"><?php echo $data['date'] ?></span>
            </span>

            <span class="v-line">|</span>

            <span class="col3">
                <span class="sub-col1">Passenger count:</span>
                <span class="sub-col2"><?php echo $data['count'] ?></span>
            </span>
        </div>

        <div class="title">
            <span class="title1">Bus No</span>
            <span class="title2">Ratings</span>
            <span class="title3">Depature</span>
            <span class="title4">Available Seats</span>
            <span class="title5">Ticket Price</span>
        </div>

        <?php if (empty($data['availableBuses'])) : ?>

            <div class="no-data">
                <i class="fa-solid fa-circle-exclamation"></i> <br>
                <span>No buses to display</span>
            </div>

        <?php else : ?>
            <?php foreach ($data['availableBuses'] as $recode) : ?>
                <!-- <div class="result" onclick="goNext('<?php echo $data['from']; ?>', '<?php echo $data['to']; ?>', '<?php echo $data['date']; ?>', '<?php echo $data['count']; ?>', '<?php echo $recode->sch_id; ?>', '<?php echo $recode->boks_id; ?>', '<?php echo $recode->bus_no; ?>')"> -->
                <div class="result" onclick="goNext('<?php echo $recode->sch_id; ?>', '<?php echo $recode->boks_id; ?>', '<?php echo $data['count']; ?>')">

                    <span class="result1"><?php echo $recode->bus_no; ?></span>

                    <span class="result2">
                        <?php $i = 0; ?>

                        <?php while ($i < floor($recode->ratings)) : ?>
                            <i class="fa-solid fa-star"></i>
                            <?php $i++; ?>
                        <?php endwhile; ?>

                        <?php if ($recode->ratings - (floor($recode->ratings)) > 0) : ?>
                            <i class="fa-regular fa-star-half-stroke"></i>
                            <?php $i++; ?>
                        <?php endif; ?>

                        <?php while ($i < 5) : ?>
                            <i class="fa-regular fa-star"></i>
                            <?php $i++; ?>
                        <?php endwhile; ?>

                        <span class="responses">(<?php echo $recode->responses; ?>)</span>
                    </span>

                    <span class="result3"><?php echo date('h:i A', strtotime($recode->departure_time)) ?></span>

                    <span class="result4">
                        <span><?php echo $recode->available_seats_count; ?></span>
                        <span class="capacity">/ <?php echo $recode->capacity; ?></span>
                    </span>

                    <span class="result5">LKR <?php echo number_format($recode->ticket_price * $data['count'], 2); ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="btn">
            <button onclick="goBack()">Reset</button>
        </div>
    </div>

    <!-- <script src="<?php echo URLROOT; ?>/js/passenger-js/available-buses-js.js"></script> -->

    <script>
        function goBack() {
            window.history.back();
        }


        /*function goNext(from, to, date, count, sch_id, boks_id, bus_no) {
            const url = "http://localhost/taptobus/passenger_book_seats/bus_details?from=" + from + "&to=" + to + "&date=" + date + "&count=" + count + "&sch_id=" + sch_id + "&boks_id=" + boks_id + "&bus_no=" + bus_no;
            window.location.href = url;
        }*/

        function goNext(sch_id, boks_id, count){
            const url = "http://localhost/taptobus/passenger_book_seats/bus_details?sch_id=" + sch_id + "&boks_id=" + boks_id + "&count=" + count;
            window.location.href = url;
        }
    </script>

</body>

</html>