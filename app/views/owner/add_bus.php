<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owner-style/addbus-style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>

    <?php require APPROOT . '/views/inc/owner_navbar.php' ?>

    <div class="outer">

        <div class="container">


            <h2>Bus Registration</h2>

            <!-- <?php

            if (!empty($errorMessage)) {

                echo "
                <div class = 'alert-warning'  role = 'alert'>
                <strong> $errorMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'close' ></button>
                </div>
            ";
            }
            ?> -->

            <div class="error" id="error-box">

                <em id="error"></em>
            </div>

            <form action="" method="post" name="addbus-form" onsubmit="return isValid()">

                <div class="big">
                    <div class="row">
                        <div class="a">
                            <label>Bus No</label>
                        </div>
                        <div class="b">
                            <input type="text" class="form-control" name="bus_no" id="bus_no"   required>
                        </div>
                        <span><?php echo $data['bus_no_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="a">
                            <label>Root No</label>
                        </div>
                        <div class="b">
                            <input type="text" class="form-control" name="root_no" id="root_no"  required>
                        </div>
                        <span><?php echo $data['root_no_err']; ?></span>
                    </div>

                   

                    <div class="row">
                        <div class="a">
                            <label>capacity</label>
                        </div>
                        <div class="b">
                            <input type="text" class="form-control" name="capacity" id="capacity"   required>
                        </div>
                        <span><?php echo $data['capacity_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="a">
                            <label>bus image</label>
                        </div>
                        <div class="b">
                            <input type="file" class="form-control" name="bus_image" id="bus_image"  accept="image/*">
                        </div>
                    </div>

                   


                    <div class="row">
                        <div class="a">
                            <label>Facilities</label>
                        </div>
                        <div class="b flex">
                            <input type="checkbox" id="wifi" name="wifi">
                            <label for="vehicle1"> WIFI</label><br>
                            <input type="checkbox" id="usb" name="usb">
                            <label for="vehicle2"> USB</label><br>
                            <input type="checkbox" id="tv" name="tv">
                            <label for="vehicle3"> TV</label><br>
                        </div>
                    </div>


                </div>

                <!-- <?php
                        if (!empty($successMessage)) {

                            echo "
                    <div class = row  >
                        <div  class = a>
                             <div class = 'alert-success' role = 'alert'>
                             <stong>$successMessage</stong>
                            <button type = 'button' class = 'btn-close' datadismiss = 'alert' ></button>
                            </div>
                       </div>
                    </div>
                 ";
                        }
                        ?> -->

                <div class="row">

                    <input type="submit" value="Submit">
                    <input type="submit" value="Cancel">

                </div>



            </form>

        </div>
    </div>

    <script type="text/javascript " src="<?php echo URLROOT; ?>/js/owner-js/add_bus.js"> </script>
</body>

</html>