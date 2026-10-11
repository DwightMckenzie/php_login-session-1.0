<?php ?>
<!DOCTYPE html>
<html lang="en">
	<?php
		$app_name = 'PHP Secured Session 2.0';
	?>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="keywords" content="" />
		<title><?php echo $app_name; ?> - <?php if(isset($pg_title)) { echo $pg_title; }; ?></title>
		<!-- <title>Salary - <?= $pg_title; ?></title> -->
		<link rel="icon" href="./imgs/salary-favicon.png"/>
		<meta name="description" content="Salary Session Beta v3.2 2023" />
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- <link href="./style.css" rel="stylesheet" /> -->
		<!-- <php require "./functions.php"; ?> -->
	</head>

	<!--
	The body tag has a dynamic selector "$session_status" to ready functions if the user is logged in
	Main variable is located in the index.php
	-->

	<body class="<?php if (isset($pg_class)) { echo $pg_class; } else { echo ''; } ?> <?php if( isset($_SESSION['status']) ) { echo 'logged-in'; } else { echo 'logged-out'; } ?>">