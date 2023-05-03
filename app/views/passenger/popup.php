<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger-style/popup-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <div class="box">
        <img src="<?php echo URLROOT; ?>/img/<?php echo $data['pic']; ?>.png" alt="Success">
        <div class="head"><?php echo $data['head'] ?></div>
        <div class="desc"><?php echo $data['desc'] ?></div>
        <div class="btn"><a href="<?php echo $data['success-link'] ?>"><button>Ok</button></a></div>
    </div>
</body>
</html>