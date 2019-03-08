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
		<style> .centered { display: table; margin-left: auto; margin-right: auto; } </style>
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
						<?php
						
						if(is_file("/var/www/html/uploads/input.jpg")==true){
						 unlink ("/var/www/html/uploads/input.jpg");
						}
						
						// 설정
						$uploads_dir = './uploads';
						$allowed_ext = array('JPG','jpg','jpeg','png','gif');
						 
						// 변수 정리
						$error = $_FILES['myfile']['error'];
						$name = $_FILES['myfile']['name'];
						$ext = array_pop(explode('.', $name));
						 
						// 오류 확인
						if( $error != UPLOAD_ERR_OK ) {
							switch( $error ) {
								case UPLOAD_ERR_INI_SIZE:
								case UPLOAD_ERR_FORM_SIZE:
									echo "파일이 너무 큽니다. ($error)";
									break;
								case UPLOAD_ERR_NO_FILE:
									echo "파일이 첨부되지 않았습니다. ($error)";
									break;
								default:
									echo "파일이 제대로 업로드되지 않았습니다. ($error)";
							}
							exit;
						}
						 
						// 확장자 확인
						if( !in_array($ext, $allowed_ext) ) {
							echo "허용되지 않는 확장자 이거나 알 수없는 오류가 발생하였습니다.";
							exit;
						}
						 
						// 파일 이동
						move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");
						
						// 파일 정보 출력
						#echo "<h2>파일 정보</h2>
						#<ul>
						#	<li>파일명: $name</li>
						#	<li>확장자: $ext</li>
						#	<li>파일형식: {$_FILES['myfile']['type']}</li>
						#	<li>파일크기: {$_FILES['myfile']['size']} 바이트</li>
						#</ul>";
								
						?>
						<?php

						putenv('LANG=en_US.UTF-8');
					
						$out = shell_exec('sudo python3 /var/www/html/success.py 2>&1');
						echo '<pre>'.$out.'</pre>';
						?>
						<p> 출력 결과가 맞으면 Yes  / 그렇지 않다면 No 를 클릭해 주세요!</p><br>
						<div class = "centered">
							<ul class="actions">
								<li><a href="yes.php" class="button special">Yes</a></li>
								<li><a href="#no" class="button">No</a></li>
							</ul>
						</div>
						<img src = "./uploads/input.jpg" width = "200" height = "400">
					</header>
				</section>
	        	<section id="no" class="container">
	            	<section class="box special">
	            	<article id="Upload">
						<h2 class="major"><strong>영수증 업로드</strong></h2>
						<form action="post.php" method="post">
	                    <p>상호 이름<input type="text" name="title" placeholder="Title" style="text-align:center; width:1000; height:50px;"></p>
	                    <p>전화번호<input type="text" name="telephone" placeholder="Telephone" style="text-align:center; width:1000; height:50px;"></p>
	                    <p>카테고리
	                    <select name="Code-select" id="demo-category">
										<option value="">- 카테고리 -</option>
										<option value="1">0001 ========= 알파 =========</option>
										<option value="1">0002 ========= 알파 =========</option>
										<option value="1">0003 ========= 알파 =========</option>
						</select><br>
	                    <input type="text" name="category" placeholder="카테고리 선택후 숫자를 입력해주세요" style="text-align:center; width:1000; height:50px;"></p>
	                    <p>주소<input type="text" name="address" placeholder="address" style="text-align:center; width:1000; height:50px;"></p>
	                    <p>도로명 주소<input type="text" name="roadAddress" placeholder="roadAddress" style="text-align:center; width:1000; height:50px;"></p>
	                    <span style = "float:right"><input type = "submit" /></span>
	               		</form><br><br><br>
	               		<font color="blue"><strong>이용해 주셔서 감사합니다 :)</strong></font>
					</article>
	                </section>
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