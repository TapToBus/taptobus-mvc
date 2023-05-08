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
        $active = "Restore"; 
        require APPROOT . '/views/inc/admin_navbar.php' 
    ?>

    <div class="main">
        <div class="content-heading">
            <h1>Bus owners</h1>
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
                    <th>NIC</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Mobile no</th>


                    <th class="delete-button"></th>
                </tr>

                <?php foreach ($data['removeowners'] as $removeowners) : ?>
                    <tr>
                        <td><?php echo $removeowners->nic; ?></td>
                        <td><?php echo $removeowners->fname; ?></td>
                        <td><?php echo $removeowners->lname; ?></td>
                        <td><?php echo $removeowners->email; ?></td>
                        <td><?php echo $removeowners->mobileNo; ?></td>
                        <td>
                            <div class="delete-button">
                                <button class="delete-btn" type="button" onclick="openModal('<?php echo $removeowners->nic ?>')">Restore</button>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>




            </table>

        </div>

    </div>

    <dialog id="resetPopup" class="resetPopup"> 
        <div class="resetPopup-contianer">
            <h1>Are You Sure ?</h1>
            <p>Do you really wants to re activate this bus owner.</p>
            <form action="<?php echo URLROOT?>/Admin_remove_user_dashboard/remove_bus_owner"  method="POST" class="delete-button">
                <button class="delete-btn" type="submit" id="removeBusOwnerBtn" name="removeBusOwnerBtn">Yes</button>
                <button class="delete-btn" type="button" onclick="closeModal()">No</button>
            </form>
        </div>
    </dialog>
    
    
    <script src="<?php echo URLROOT; ?>/js/admin-js/reset-owner-popup.js"></script>
</body>

</html>