<?php

	/**
	 * global navigation bar
	 */

	$user_id = $_SESSION['id'];
	$user_name = $_SESSION['username'];

?>

<!-- header container -->
<div class="container">
	<div class="header">
		<div class="row">
			<div class="col-lg-10">
				<!-- <h4><strong><?= $user_name; ?></strong></h4> -->
				<h4><strong><?= e($user_name) ?></strong></h4>
				<h4><strong><?= $user_id ?></strong></h4>
			</div>
			<div class="col-lg-2" style="display:flex;justify-content:flex-end;">
				<!-- <div class="button" style="margin-right:10px;">
					<a href="profile.php" class="btn btn-sm btn-info">Profile</a>
				</div> -->
				<div class="button">
					<a href="logout.php?status=logged-in" class="btn btn-sm btn-info">Logout</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="./page-1.php">Page-1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./page-2.php">Page-2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./page-3.php">Page-3</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="results.php">Results</a>
							</li> -->
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div><!--End .conatiner -->

<!-- main container -->
<div class="container">
	<div class="content">