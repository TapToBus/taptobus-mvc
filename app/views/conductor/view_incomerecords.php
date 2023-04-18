<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/conductor-style/view_incomerecords-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/conductor_navbar.php' ?>

    <div class="outer">

        <div class="container">

            

                <form action="" method="post" name="add_incomerecords-form" onsubmit="return isValid()">

                    <h2>Add Income Records</h2>

                    <div class="big">
                        <div class="row">
                            <div class="a">
                                <label>Bus No</label>
                            </div>
                            <div class="b">
                                <input type="text" class="form-control" name="bus_no" id="bus_no" required>
                            </div>
                            <span><?php echo $data['bus_no_err']; ?></span> 
                        </div>

                        <div class="row">
                            <div class="a">
                                <label>Date</label>
                            </div>
                            <div class="b">
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="a">
                                <label>Amount</label>
                            </div>
                            <div class="b">
                                <input type="text" class="form-control" name="amount" id="amount" required>
                            </div>
                        </div>



                    </div>


                    <div class="row">

                        <input type="submit" value="Submit">
                        <input type="submit" value="Cancel">

                    </div>


                </form>

        
        </div>

    </div>

</body>

</html>