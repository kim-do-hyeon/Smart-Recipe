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

				<section id="main" class="container">
					<header>
						<h3>영수증 업로드</h3><br>
						<h1>영수증의 <font color="red">스캔 파일</font> 또는 <font color="red">영수증을 찍은 사진</font>을 아래의 버튼을 통해서 업로드 해주세요.</h1><br>
						<h1>바로 영수증 <font color="red">인식 결과</font>를 얻을 수 있습니다.</h1><br>
						<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
							<input type='file' name='myfile'>
							<button>보내기</button>
						</form>
						<marquee><h3>문의 사항이 있으시면 <font color="blue">010-3842-4048</font> 로 연락주세요.</h3></marquee>
					</header>
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