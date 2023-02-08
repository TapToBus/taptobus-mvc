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
            <h1>Bus owners</h1>
            <hr>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>NIC</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Mobile no</th>
                </tr>
                
                <?php foreach ($data['owners'] as $owners): ?>
                    <tr>
                        <td><?php echo $owners->nic; ?></td>
                        <td><?php echo $owners->fname; ?></td>
                        <td><?php echo $owners->lname; ?></td>
                        <td><?php echo $owners->email; ?></td>
                        <td><?php echo $owners->mobileNo; ?></td>
                    </tr>
                <?php endforeach; ?>    
            </table>
        </div>
    </div>
    <!-- </div> -->


</body>

</html>