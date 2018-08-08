<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<title>Welcome to My TechForum</title>

	<!-- Bootstrap core CSS-->
	<link rel="stylesheet" href="<?php echo BASE_URI; ?>template/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URI; ?>template/css/custom.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo BASE_URI; ?>template/js/bootstrap.js"></script>
	<script src="<?php echo BASE_URI; ?>template/js/ckeditor/ckeditor.js"></script>


	<?php
	if(!isset($title)){
		$title = SITE_TITLE;
	} 

	 ?>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Tech Forum</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">Home</a></li>
					<?php if(!isLoggedIn()) : ?>
					<li><a href="register.php">Create An Account</a></li>
				<?php else : ?>
					<li><a href="create.php">Create Topic</a></li>
				<?php endif; ?>
				

				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left"><?php echo $title; ?></h1>
						<h4 class="pull-right">Tech Forum for Developers</h4>
						<div class="clearfix"></div>
						<hr>
						<?php echo displayMessage(); ?>
