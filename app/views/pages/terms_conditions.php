<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages-style/terms-conditions-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <!-- navigation bar -->
    <?php require APPROOT . '/views/inc/pages_navbar.php' ?>

    <!-- terms & conditions -->
    <div class="details">
        <h1>Terms & Conditions</h1>

        <h2>Seat Reservation</h2>
        <ul>
            <li>A maximum of 5 seats could be reserved at once.</li>
            <li>A reference number along with ticket details will be sent to the profile and the email 
                of the passengers who book seats via the website.</li>
            <li>Passengers are requested to provide the booking reference number 
                to the conductor while the journey.</li>
            <li>A booking only becomes guaranteed once full payment has been received.</li>
            <li>You can use a valid VISA or Master credit/debit card 
                when making online bookings through the website.</li>
            <li>For safety reasons, no guest is allowed to bring dangerous goods such as 
                firearms, flammable substances, fireworks, poisonous or toxic substances, etc on board.</li>
        </ul>

        <h2>Refunding Policy</h2>
        <ul>
            <li>If you wish to cancel a booking, 
                you have to visit your passenger profile and through the bookings tab, 
                you are able to cancel your booking.</li>
            <li>Cancellation can be done according to the below-mentioned time periods 
                prior to the relevant bus departure.</li>
        </ul>

        <table>
            <tr>
                <td class="col1">Time condition</td>
                <td class="col2">Before 48 hours<br>(+2 daye)</td>
                <td class="col3">Before 24 hours<br>(+1 day)</td>
                <td class="col4">After 24 hours<br>(-1 day)</td>
            </tr>
            <tr>
                <td class="col1">Refunding percentage<br>from the ticket fee</td>
                <td class="col2">75%</td>
                <td class="col3">50%</td>
                <td class="col4">0%</td>
            </tr>
        </table>
        
        <ul>
            <li>The refund percentage will be calculated without considering the service charge.</li>
            <li>There is a limit to the number of cancellations per month.</li>
            <li>If a passenger tries more than three times to cancel bookings 
                his/her account will be suspended for a month.</li>
        </ul>

        <h2>Registration of Bus Owners</h2>
        <ul>
            <li>Bus owners are able to register themselves on the system.</li>
            <li>Bus owners can request to register buses, conductors and drivers in the system.</li>
            <li>Bus owners, buses, conductors and drivers will be added to the system after the verification process.</li>
            <li>Bus owners should post a copy of the acceptance letter which is issued by NTC prior to the registration.</li>
            <li>Before registering a bus in the system bus owners have to post 
                the root permit and license for the relevant bus(s).</li>
        </ul>
    </div>
</body>
</html>
