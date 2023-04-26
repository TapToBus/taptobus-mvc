<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/conductor-style/check_bookings-style.css">
    <title><?php echo SITENAME; ?></title>


</head>

<body>

    <?php require APPROOT . '/views/inc/conductor_navbar.php' ?>

    <div class="outer">

        <div class="container">

          <div class="search-box">

            <input type ="text" id="live_search" autocomplete="off" placeholder= "Enter the code..." >
            <i class="fa-solid fa-magnifying-glass"></i>

          </div>

        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      
        $(document).ready(function(){
    
            $("#live_search").keyup(function(){

                var input = $(this).val();
                
                if(input != ""){

                    $.ajax({

                      url: "<?php echo URLROOT; ?>/conductor_bookings/check_bookings",
                      mehtod : "POST",
                      data:{input:input},

                    });

                }
            });
        });
    </script>
</body>

</html>