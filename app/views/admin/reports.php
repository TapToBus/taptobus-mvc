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

    <?php 
        $active = "Report";
        require APPROOT . '/views/inc/admin_navbar.php' 
    ?>

    <div class="main">
        <div class="content-heading">
            <h1>REPORTS</h1>
        </div>


        <div class="report-container">
            <div class="report-sub-container">
                <form action="<?php echo URLROOT; ?>/Admin_reports/adminReportSearch" method="GET" class="report-container-form">

                    <h2 class="report-container-heading">Income Report</h2>

                    <div class="report-container-form-input-labels">
                        <label for="Date_From" class="report_date_la">Date From :</label>
                        <input type="date" name="date_from" id="date_from" class="datapicker_report">

                        <label for="Date_To" class="report_date_la">Date To :</label>
                        <input type="date" name="date_to" id="date_to" class="datapicker_report" >




                        <!-- <select name="busNo" id="busNo">
                            <?php
                            if(isset($busno) && empty($busno)){
                                echo "<option value = ''>No bus found</option>";
                            }else{
                                foreach($busno as $busNo){
                            ?>
                                    <option value='<?php echo $busNo['bus_no'] ?>'><?php echo $busNo['bus_no'] ?> </option>    
                            <?php
                                }    
                            }  
                            ?>
                        </select> -->




                        <div class="two-button">

                            <div class="search-button">
                                <div>
                                    <button type="submit" name="Search-report-records">Search</button>
                                </div>
                            </div>

                            <div class="generation-buttons">
                                <div>
                                    <a href="<?php echo URLROOT; ?>/Admin_reports/generate_pdf_report">Generate Report</a>
                                    <!-- <button type="submit" name="Generate-Report">Generate Report</button> -->
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
                            <th>From</th>
                            <th>To</th>
                            <th>Bus Number</th>
                            <th>Bookings Count</th>
                            <th>Date</th>
                            <th>Income</th>
                        </tr>

                        <?php foreach($data['reportData'] as $reportData) :?>
                            <tr>
                                <td><?php echo $reportData->from ?></td>
                                <td><?php echo $reportData->to ?></td>
                                <td><?php echo $reportData->bus_no ?></td>
                                <td><?php echo $reportData->passenger_count ?></td>
                                <td><?php echo $reportData->date ?></td>
                                <td>LKR <?php echo number_format($reportData->profit, 2, '.', ',')?></td>
                            </tr>

                        <?php endforeach; ?>    

                    </table>

                </div>

            </div>

            
        </div>

    </div>

</body>

</html>