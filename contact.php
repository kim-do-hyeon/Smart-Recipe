<?php
session_start();
if (isset($_SESSION['id']))
{
	$login_chk = 1;
}
else
{
	$login_chk = 0;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Smart Recipe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="http://api.system32.kr">Smart Recipe</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="http://api.system32.kr">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Pages</a>
								<ul>
									<li><a href="user.php">Users</a></li>
									<li><a href="contact.php">Contact</a></li>
									<li>
										<a href="#">Who are we?</a>
										<ul>
											<li><a href="pental.php">Kim Do Hyeon</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<?php
							if ($login_chk == 0)
							{
								echo '<li><a href="http://api.system32.kr#login" class="button">Sign Up</a></li>';
							}
							else
							{
								echo' 
								<li><a href="upload.php"><font color = "yellow">Use Smart Recipe</font></a></li>
								<li><a href="logout.php" class="button" >Logout from "' . $_SESSION[id] . '"</a></li>';
							}
							?>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Contact Us</h2>
						<p>Tell us what you think about our little operation.</p>
					</header>
					<div class="box">
						<form method="post" action="#">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-6 col-12-mobilep">
									<input type="text" name="name" id="name" value="" placeholder="Name" />
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="email" name="email" id="email" value="" placeholder="Email" />
								</div>
								<div class="col-12">
									<input type="text" name="subject" id="subject" value="" placeholder="Subject" />
								</div>
								<div class="col-12">
									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" value="Send Message" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://www.facebook.com/deohyeon" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/dohyeon_pental/?hl=ko" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="http://github.com/kimdeohyeon" class="icon fa-github"><span class="label">Github</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; PENTAL 2018 (Do.Hyeon.Kim).<br></br>All rights reserved.</li><!-- Design : HTML5up -->
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>