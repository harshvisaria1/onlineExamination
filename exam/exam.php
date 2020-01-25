<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<div class="main">
<h1>Welcome to Online Exam - Start Now</h1>
	<div class="segment" style="margin-right:30px;">
		<h2>Details</h2>
		<!-- <img src="img/online_exam.png"/> -->
		Name: John Doe<br>
		Email: john@doe.com <br>
		Contact: +91 98123 72635<br>
	</div>
	<div class="segment">
	<h2>Instructions</h2>
	<ul>
		<li>1. Do not pee</li>
		<li>2. Do not see</li>
		<li>3. You are free</li>
		<br>
		<li><a href="starttest.php">Start Now...</a></li>
	</ul>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>