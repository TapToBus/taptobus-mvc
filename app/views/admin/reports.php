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

    <?php require APPROOT . '/views/inc/admin_navbar.php' ?>

    <div class="main">
        <div class="content-heading">
            <h1>REPORTS</h1>
        </div>


        <div class="report-container">
            <div class="report-sub-container">
                <form action="<?php echo URLROOT; ?>/Admin_reports/adminReportSearch" method="GET" class="report-container-form">

                    <h2 class="report-container-heading">Profit Report</h2>

                    <div class="report-container-form-input-labels">
                        <label for="Date_From" class="report_date_la">Date From :</label>
                        <input type="date" name="date_from" id="date_from" class="datapicker_report">

                        <label for="Date_To" class="report_date_la">Date To :</label>
                        <input type="date" name="date_to" id="date_to" class="datapicker_report" >

                        <select name="busNo" id="" class="" data-validation="required">
                            <option value="AB">All Bus</option>
                        </select>

                        <div class="two-button">

                            <div class="submit-reset-buttons">
                                <div>
                                    <button type="submit" name="Generate-Report" class="report-search-button">Search</button>
                                </div>
                            </div>

                            <div class="generation-buttons">
                                <div>
                                    <button type="submit" name="Generate-Report">Generate Report</button>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>

            </div>
            <div class="report-sub-container">

                <div class="content-table">

                    <table class="full-table">

                        <tr>
                            <th>Record ID</th>
                            <th>Bus Number</th>
                            <th>Date</th>
                            <th>Profit</th>
                        </tr>

                        <?php foreach($data['reportData'] as $reportData) :?>
                            <tr>
                                <td><?php echo $reportData->record_id ?></td>
                                <td><?php echo $reportData->bus_no ?></td>
                                <td><?php echo $reportData->date ?></td>
                                <td>LKR <?php echo number_format($reportData->profit, 2, '.', ',')?></td>
                            </tr>

                        <?php endforeach; ?>    

                    </table>

                </div>

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