<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin-style/view.css">
    <script src="https://kit.fontawesome.com/74174153b4.js" crossorigin="anonymous"></script>
    <title><?php echo SITENAME; ?></title>
</head>

<body>

<?php require APPROOT .'/views/inc/admin_navbar.php' ?>

<div class="main">
    <div class="content-heading">
        <h1>REPORTS</h1>        
    </div>


        <div class="report-container">
            <div class="report-sub-container">
                <form action="<?php echo URLROOT ?>/Admin_reports/Date_From_Date_To" method="POST" class="report-container-form">
                    
                    <h2 class="report-container-heading">Profit Report</h2>

                    <label for="Date_From" class="report_date_la">Date From :</label>
                    <input type="date" name="date_from" id="date_from" class="datapicker_report" data-validation="required">

                    <label for="Date_To" class="report_date_la">Date To :</label>
                    <input type="date" name="date_to" id="date_to" class="datapicker_report" data-validation="required">

                    <div class="submit-reset-buttons">
                        <div>
                            <input type="submit" name="Generate-Report" value="Generate-Report" class="add_staff_member_submit_button">
                        </div>

                    </div>

                    <!-- <label for="Bus_no" class="report_date_la">Bus Number :</label>
                    <select name="busNo" id="" class="" data-validation="required">
                        <option value="AB">All Bus</option>

                    </select> -->
                </form>

            </div>
            <div class="report-sub-container">
                <p>xxxxxxxxxxxxxxxx</p>
            </div>
        </div>

        <div class="report-container">

            <div class="report-sub-container">
                <p>xxxxxxxxxxxxxxxx</p>
            </div>

        </div>


</div>

</body>
</html>