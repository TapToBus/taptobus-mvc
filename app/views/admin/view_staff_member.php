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
            <h1>Staff members</h1>
            <hr>
        </div>

        <button class="add-new-staff-member-box">

            <div class="button-name">
                <a href="<?php echo URLROOT; ?>/Admin_add_staff_member/add_staff_member" class="grid-items">
                    <i class="fa-solid fa-user-tie"></i>
                    <p>Add staff members</p>
                </a>
            </div>
        </button>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>Staff no</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>NIC</th>
                    <th>DOB</th>
                    <th>Mobile no</th>
                    <th>Telephone no</th>
                    <th>Email</th>
                </tr>

                <?php foreach ($data['staffmembers'] as $staffmembers) : ?>
                    <tr>
                        <td><?php echo $staffmembers->staff_no; ?></td>
                        <td><?php echo $staffmembers->first_name; ?></td>
                        <td><?php echo $staffmembers->last_name; ?></td>
                        <td><?php echo $staffmembers->nic; ?></td>
                        <td><?php echo $staffmembers->dob; ?></td>
                        <td><?php echo $staffmembers->mobile_no; ?></td>
                        <td><?php echo $staffmembers->tele_no; ?></td>
                        <td><?php echo $staffmembers->email; ?></td>
                        

                    </tr>
                <?php endforeach; ?>


            </table>

        </div>

    </div>

    <script src="<?php echo URLROOT; ?>/js/admin/staffhome.js"></script>



</body>

</html>