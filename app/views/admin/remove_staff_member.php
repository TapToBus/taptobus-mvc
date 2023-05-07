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

    <!-- fro request the up navigation bar and side dashboard -->
    <?php require APPROOT . '/views/inc/admin_navbar.php' ?>

    <div class="main">
        <div class="content-heading">
            <h1>STAFF MEMBER</h1>
        </div>

        <div class="searching-and-sorting">
            <div class="searching">
                <input type="text" id="search" placeholder="Search here">
                <label for="search"><i class="fas fa-search"></i></label>

            </div>
            <div class="sorting">
                
            </div>
        </div>

        <div class="content-table">
            <table class="full-table">
                <tr>
                    <th>Staff no</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>nic</th>
                    <th>Mobile no</th>
                    <th>Tele no</th>
                    <th>Email</th>
                    <th class="delete-button"></th>
                </tr>

                <!-- for get table data from data base within array named data and assign with name removestaffmember -->
                <?php foreach ($data['removestaff'] as $removestaff) : ?>
                    <tr>
                        <td><?php echo $removestaff->staff_no; ?></td>
                        <td><?php echo $removestaff->first_name; ?></td>
                        <td><?php echo $removestaff->last_name; ?></td>
                        <td><?php echo $removestaff->nic; ?></td>
                        <td><?php echo $removestaff->mobile_no; ?></td>
                        <td><?php echo $removestaff->tele_no; ?></td>
                        <td><?php echo $removestaff->email; ?></td>
                        <td class="delete-button">
                            <div class="delete-button">
                                <!-- pass the button to the js with row id staff_no -->
                                <!-- if you press the button it will direct to the popup message -->
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $removestaff->staff_no ?>')">Restore</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- for popup message -->
    <dialog id="resetPopup" class="resetPopup">
        <div class="resetPopup-container">
            <h1>Are You Sure ?</h1>
            <p>Do yo really wants to re active this staffmember.</p>

            <!-- get the action and post the data or cancle the action -->
            <form action="<?php echo URLROOT ?>/Admin_remove_user_dashboard/reset_staff_member" method="POST" class="delete-button">
                <button class="delete-btn" type="submit" id="removestaffmemberbtn" name="removestaffmemberbtn">Yes</button>
                <button class="delete-btn" type="button" onclick="closeModel()">No</button>
            </form>
        </div>
    </dialog>

    <script src="<?php echo URLROOT; ?>/js/admin-js/reset-staff-member.js"></script>

</body>

</html>