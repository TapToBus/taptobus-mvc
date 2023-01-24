<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages-style/index-style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
	<?php require APPROOT . '/views/inc/pages_navbar.php' ?>

	<div class="content">
		<h1>BOOK YOUR SEATS</h1>

		<p>You can easily book seats online on expressway buses via TapToBus</p>

		<div class="btn">
			<a href="<?php echo URLROOT; ?>/users/login"><button><span></span>Log In</button></a>
			<a href="<?php echo URLROOT; ?>/users/register_type"><button><span></span>Register</button></a>
		</div>
	</div>
</body>
</html>
