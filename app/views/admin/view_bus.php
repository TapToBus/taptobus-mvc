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
            <h1>BUSES</h1>
        </div>

        <div class="searching-and-sorting">
            <div class="searching">
                <input type="text" id="search" placeholder="Search here">
                <label for="search"><i class="fas fa-search"></i></label>

            </div>
            <div class="sorting">
                for sorting bar
            </div>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>Bus no</th>
                    <th>Owner ID</th>
                    <th>Driver ID</th>
                    <th>Conductor ID</th>
                    <th>Root permit no</th>
                    <th>License no</th>
                    <th>Capacity</th>
                    <th>Rating</th>
                </tr>

                <?php foreach($data['buses'] as $buses): ?>
                <tr>
                    <td><?php echo $buses->bus_no; ?></td>
                    <td><?php echo $buses->root_no;?></td>
                    <td><?php echo $buses->owner_name;?></td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
                <?php endforeach; ?>
                
            </table>
        </div>
    </div>
    <!-- </div> -->


</body>

</html>